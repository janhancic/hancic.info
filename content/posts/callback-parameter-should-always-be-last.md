+++
title = "Callback parameter should always be last"
date = "2013-02-10T14:05:29Z"
author = "Jan Hančič"
+++

![callbacks](/post_images/callbacks.png)[Node.js](http://nodejs.org/) is famous for being asynchronous. That means you'll have a lot of callbacks or anonymous functions in your code. This can quickly lead to somewhat hard to follow code (hello callback pyramids). But that's not what I want to talk about today.

What I want to talk about is the order of parameters in functions that also accept callbacks as parameters. To be fair in most of the libraries (that I've come across) this isn't a issue. But there are some that have this problem. And the problem is that the callback is no the last parameter. One example is [jake's task](https://github.com/mde/jake#tasks). Here the callback is second to last. This means you might end up writing code that looks like this:

```js
task(
  'my-task',
  ['other-task', 'fancy-task'],
  function () {
    // code
    // some more code
    // a bit more code
  },
  {async: true}
);

```

Don't see the problem yet? OK let's go trough how one might read the code:
* aha, a new task is being defined here
* it's name is "my-task"
* it depends on "other-task" and "fancy-task"
* it accomplishes "code", "some more code" and "a bit more code"
* oh and by the way, the code that you just read uses some asynchronous code

Imagine a larger code block in the callback and the problem is more apparent. I think that you should first collect all the information you need and at the very end define the callback that get's executed. It's the same reasoning as for "put variable declarations to the top of the function". This only get's worse in nested callbacks which is already hard to follow along. So please, stop doing this.
