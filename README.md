[![Build Status](https://travis-ci.org/Automattic/_s.svg?branch=master)](https://travis-ci.org/Automattic/_s)

greydon
===

Hi. I'm a starter theme called greydon.


Getting Started
---------------

* Replace 'new-site-name' with the new name and '~/Desktop/Website/site-name/' with the folder location

perl -pi -w -e 's/greydon/new-site-name/g;' ~/Desktop/Website/site-name/*

* To get gulp running, install the dependencies

npm install --save-dev gulp gulp-util gulp-concat gulp-watch gulp-compass gulp-plumber gulp-livereload



Sass mixin usage
---------------

* Breakpoints

.sidebar {
  width: 60%;
  @include bp-small {
    width: 100%;
  }
}


* Animations and keyframes

@include keyframes(slide-down) {
  0% { opacity: 1; }
  90% { opacity: 0; }
}

.element {
  width: 100px;
  height: 100px;
  background: black;
  @include animation('slide-down 5s 3');
}


* Transitions

a {
  color: gray;
  @include transition(color .3s ease);
  &:hover {
    color: black;
  }
}


* Cross browser opacity

.faded-text {
  @include opacity(0.8);
}

* The amazing row machine!
.person {
  @include rowMachine(5, 2%);
}
