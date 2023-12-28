// Package main implements a simple binary that reads a SQLite DB which contains a `wp_posts` table and
// outputs the contents of the table as a series of Hugo .md files into tmp/.
// The `db.sqlite3` was created by importing a MySQL dump from my old WordPress blog into SQLite.
package main

import (
	"database/sql"
	"fmt"
	"log"
	"os"
	"regexp"
	"strings"

	html2md "github.com/JohannesKaufmann/html-to-markdown"
	_ "github.com/mattn/go-sqlite3"
)

const postTpl = `+++
title = "%s"
date = "%s"
author = "Jan Hančič"
+++

%s
`

func main() {
	db, err := sql.Open("sqlite3", "./db.sqlite3")
	if err != nil {
		log.Fatal(err)
	}
	defer db.Close()

	rows, err := db.Query("SELECT post_title, post_content, post_name, post_date FROM wp_posts WHERE post_status = 'publish'")
	if err != nil {
		log.Fatal(err)
	}
	defer rows.Close()

	mdConverter := html2md.NewConverter("", true, nil)
	re := regexp.MustCompile(`/wp-content/uploads/\d{4}/\d{2}/`)

	for rows.Next() {
		var postTitle string
		var postContent string
		var postName string
		var postDate string
		err = rows.Scan(&postTitle, &postContent, &postName, &postDate)
		if err != nil {
			log.Fatal(err)
		}

		if postTitle == "About" || postTitle == "Showcase" {
			continue
		}

		log.Print(postTitle, postDate)

		postContent = strings.ReplaceAll(postContent, "\\r\\n", "\n")
		postContent = strings.ReplaceAll(postContent, "\\n", "\n")
		postContent = strings.ReplaceAll(postContent, "\\\"", "\"")
		postContent = strings.ReplaceAll(postContent, "http://hancic.info/", "/")
		postContent = re.ReplaceAllString(postContent, "/post_images/")
		postContent = strings.ReplaceAll(postContent, "<!--more-->", "")

		postContent, err := mdConverter.ConvertString(postContent)
		if err != nil {
			log.Fatal(err)
		}

		postContent = strings.ReplaceAll(postContent, "\\-", "*")

		mdContents := fmt.Sprintf(postTpl, postTitle, postDate, postContent)

		os.WriteFile("tmp/"+postName+".md", []byte(mdContents), 0666)

	}
	err = rows.Err()
	if err != nil {
		log.Fatal(err)
	}
}
