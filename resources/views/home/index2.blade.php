@extends('layouts.home')

@section('content')
<style>
@font-face {
  font-family: 'Lato';
  font-style: normal;
  font-weight: 100;
  src: local('Lato Hairline'), local('Lato-Hairline'), url(http://themes.googleusercontent.com/static/fonts/lato/v6/boeCNmOCCh-EWFLSfVffDg.woff) format('woff')
}

@font-face {
  font-family: 'Lato';
  font-style: normal;
  font-weight: 300;
  src: local('Lato Light'), local('Lato-Light'), url(http://themes.googleusercontent.com/static/fonts/lato/v6/KT3KS9Aol4WfR6Vas8kNcg.woff) format('woff')
}

@font-face {
  font-family: 'Lato';
  font-style: normal;
  font-weight: 400;
  src: local('Lato Regular'), local('Lato-Regular'), url(http://themes.googleusercontent.com/static/fonts/lato/v6/9k-RPmcnxYEPm8CNFsH2gg.woff) format('woff')
}

@font-face {
  font-family: 'icomoon';
  src: url('../fonts/icomoon.eot');
  src: url('../fonts/icomoon.eot?#iefix') format('embedded-opentype'),
    url('../fonts/icomoon.woff') format('woff'),
    url('../fonts/icomoon.ttf') format('truetype'),
    url('../fonts/icomoon.svg#icomoon') format('svg');
  font-weight: normal;
  font-style: normal
}

/* Use the following CSS code if you want to use data attributes for inserting your icons */

[data-icon]:before {
  font-family: 'icomoon';
  content: attr(data-icon);
  speak: none;
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
  line-height: 1;
  -webkit-font-smoothing: antialiased
}

/* Use the following CSS code if you want to have a class per icon */

/*
Instead of a list of all class selectors,
you can use the generic selector below, but it's slower:
[class*="icon-"] {
*/

.icon-arrow-right,
.icon-calendar-alt-fill,
.icon-chrome,
.icon-picassa,
.icon-skype,
.icon-cloud,
.icon-cloudy,
.icon-dropbox,
.icon-instagram {
  font-family: 'icomoon';
  speak: none;
  font-style: normal;
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
  line-height: 1;
  -webkit-font-smoothing: antialiased
}

.icon-arrow-right:before {
  content: "\e000"
}

.icon-calendar-alt-fill:before {
  content: "\e001"
}

.icon-chrome:before {
  content: "\e002"
}

.icon-picassa:before {
  content: "\e003"
}

.icon-skype:before {
  content: "\e004"
}

.icon-cloud:before {
  content: "\e005"
}

.icon-cloudy:before {
  content: "\e006"
}

.icon-dropbox:before {
  content: "\e007"
}

.icon-instagram:before {
  content: "\f16d"
}

/*

Copyright © 2013 Sara Soueidan

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.



*/

/*///////////////////////////////////////////////////////////////////////////////////////////////////////////*/

.slidePageInFromLeft {
  -webkit-animation: slidePageInFromLeft .8s cubic-bezier(.01,1,.22,.99) 1 0.25s normal forwards;
  -o-animation: slidePageInFromLeft .8s cubic-bezier(.01,1,.22,.99) 1 0.25s normal forwards;
  animation: slidePageInFromLeft .8s cubic-bezier(.01,1,.22,.99) 1 0.25s normal forwards
}

.openpage {
  -webkit-animation: rotatePageInFromRight 1s cubic-bezier(.66,.04,.36,1.03) 1 normal forwards;
  -o-animation: rotatePageInFromRight 1s cubic-bezier(.66,.04,.36,1.03) 1 normal forwards;
  animation: rotatePageInFromRight 1s cubic-bezier(.66,.04,.36,1.03) 1 normal forwards
}

.slidePageBackLeft {
  opacity: 1;
  left: 0;
  -webkit-animation: slidePageBackLeft .8s ease-out 1 normal forwards;
  -o-animation: slidePageBackLeft .8s ease-out 1 normal forwards;
  animation: slidePageBackLeft .8s ease-out 1 normal forwards
}

.slidePageLeft {
  opacity: 1;
  -webkit-transform: rotateY(0) translateZ(0);
  -ms-transform: rotateY(0) translateZ(0);
  -o-transform: rotateY(0) translateZ(0);
  transform: rotateY(0) translateZ(0);
  -webkit-animation: slidePageLeft .8s ease-out 1 normal forwards;
  -o-animation: slidePageLeft .8s ease-out 1 normal forwards;
  animation: slidePageLeft .8s ease-out 1 normal forwards
}

.fadeOutback {
  -webkit-animation: fadeOutBack 0.3s ease-out 1 normal forwards;
  -o-animation: fadeOutBack 0.3s ease-out 1 normal forwards;
  animation: fadeOutBack 0.3s ease-out 1 normal forwards
}

.fadeInForward-1,
.fadeInForward-2,
.fadeInForward-3 {
  opacity: 0;
  -webkit-transform: translateZ(-5em) scale(0.75);
  -ms-transform: translateZ(-5em) scale(0.75);
  -o-transform: translateZ(-5em) scale(0.75);
  transform: translateZ(-5em) scale(0.75);
  -webkit-animation: fadeInForward .5s cubic-bezier(.03,.93,.43,.77) .4s normal forwards;
  -o-animation: fadeInForward .5s cubic-bezier(.03,.93,.43,.77) .4s normal forwards;
  animation: fadeInForward .5s cubic-bezier(.03,.93,.43,.77) .4s normal forwards
}

.fadeInForward-2 {
  -webkit-animation-delay: .55s;
  -o-animation-delay: .55s;
  animation-delay: .55s
}

.fadeInForward-3 {
  -webkit-animation-delay: .7s;
  -o-animation-delay: .7s;
  animation-delay: .7s
}

@keyframes fadeOutBack {
  0% {
    -webkit-transform: translateX(-2em) scale(1);
    -ms-transform: translateX(-2em) scale(1);
    -o-transform: translateX(-2em) scale(1);
    transform: translateX(-2em) scale(1);
    opacity: 1
  }

  70% {
    -webkit-transform: translateZ(-5em) scale(0.6);
    -ms-transform: translateZ(-5em) scale(0.6);
    -o-transform: translateZ(-5em) scale(0.6);
    transform: translateZ(-5em) scale(0.6);
    opacity: 0.5
  }

  95% {
    -webkit-transform: translateZ(-5em) scale(0.6);
    -ms-transform: translateZ(-5em) scale(0.6);
    -o-transform: translateZ(-5em) scale(0.6);
    transform: translateZ(-5em) scale(0.6);
    opacity: 0.5
  }

  100% {
    -webkit-transform: translateZ(-5em) scale(0);
    -ms-transform: translateZ(-5em) scale(0);
    -o-transform: translateZ(-5em) scale(0);
    transform: translateZ(-5em) scale(0);
    opacity: 0
  }
}

@keyframes fadeInForward {
  0% {
    -webkit-transform: translateZ(-5em) scale(0);
    -ms-transform: translateZ(-5em) scale(0);
    -o-transform: translateZ(-5em) scale(0);
    transform: translateZ(-5em) scale(0);
    opacity: 0
  }

  100% {
    -webkit-transform: translateZ(0) scale(1);
    -ms-transform: translateZ(0) scale(1);
    -o-transform: translateZ(0) scale(1);
    transform: translateZ(0) scale(1);
    opacity: 1
  }
}

@keyframes rotatePageInFromRight {
  0% {
    -webkit-transform: rotateY(-90deg) translateZ(5em);
    -ms-transform: rotateY(-90deg) translateZ(5em);
    -o-transform: rotateY(-90deg) translateZ(5em);
    transform: rotateY(-90deg) translateZ(5em);
    opacity: 0
  }

  30% {
    opacity: 1
  }

  100% {
    -webkit-transform: rotateY(0deg) translateZ(0);
    -ms-transform: rotateY(0deg) translateZ(0);
    -o-transform: rotateY(0deg) translateZ(0);
    transform: rotateY(0deg) translateZ(0);
    opacity: 1
  }
}

@keyframes slidePageLeft {
  0% {
    left: 0;
    -webkit-transform: rotateY(0deg) translateZ(0);
    -ms-transform: rotateY(0deg) translateZ(0);
    -o-transform: rotateY(0deg) translateZ(0);
    transform: rotateY(0deg) translateZ(0);
    opacity: 1
  }

  70% {
    opacity: 1
  }

  100% {
    opacity: 0;
    left: -150%;
    -webkit-transform: rotateY(0deg);
    -ms-transform: rotateY(0deg);
    -o-transform: rotateY(0deg);
    transform: rotateY(0deg)
  }
}

@keyframes slidePageInFromLeft {
  0% {
    opacity: 0
  }

  30% {
    opacity: 1
  }

  100% {
    opacity: 1;
    left: 0
  }
}

@keyframes slidePageBackLeft {
  0% {
    opacity: 1;
    left: 0;
    -webkit-transform: scale(0.95);
    -ms-transform: scale(0.95);
    -o-transform: scale(0.95);
    transform: scale(0.95)
  }

  10% {
    -webkit-transform: scale(0.9);
    -ms-transform: scale(0.9);
    -o-transform: scale(0.9);
    transform: scale(0.9)
  }

  70% {
    opacity: 1
  }

  100% {
    opacity: 0;
    left: -150%
  }
}

/*======================= media queries for animations =======================*/

@media screen and (min-width: 64em) {
@keyframes fadeInForward {
    80% {
      opacity: 0.9
    }

    100% {
      -webkit-transform: translateZ(0) scale(1) translateX(-2em);
      -ms-transform: translateZ(0) scale(1) translateX(-2em);
      -o-transform: translateZ(0) scale(1) translateX(-2em);
      transform: translateZ(0) scale(1) translateX(-2em);
      opacity: 1
    }
}
}

/*/////////////////////////////////////////////////////////////////////////////////////////////////////////*/

* {
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  margin: 0;
  padding: 0
}

.clearfix:before,
.clearfix:after {
  content: " ";
  display: table
}

.clearfix:after {
  clear: both
}

.clearfix {
  *zoom: 1
}

html {
  height: 100%;
  overflow-y: scroll;
  overflow-x: hidden
}

body {
  width: 100%;
  height: 100%;
  line-height: 1.5;
  font-family: 'Lato', sans-serif;
  font-weight: 300;
  font-size: 16px;
  background-color: #eee;
  background: url(../img/bg.jpg) left top no-repeat;
  background-size: 100% 100%
}

ul {
  list-style-type: none
}

header {
  background-color: rgba(0,0,0,0.2);
  height: 35px;
  line-height: 35px;
  padding: 0 30px;
  color: white;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 2
}

header a {
  text-decoration: none;
  color: inherit;
  font-size: 17px
}

.demo-wrapper {
  padding: 2em .5em;
  width: 100%;
  height: 100%;
  -webkit-perspective: 3300px;
  -ms-perspective: 3300px;
  -o-perspective: 3300px;
  perspective: 3300px;
  position: relative
}

.dashboard {
  margin: 0 auto;
  width: 100%;
  padding: 1em;
  -webkit-transform: translateX(200px);
  -ms-transform: translateX(200px);
  -o-transform: translateX(200px);
  transform: translateX(200px);
  opacity: 0;
  -webkit-animation: start 1s ease-out forwards;
  -o-animation: start 1s ease-out forwards;
  animation: start 1s ease-out forwards
}

@-webkit-keyframes start {
  0% {
    -webkit-transform: translateX(200px);
    opacity: 0
  }

  50% {
    opacity: 1
  }

  100% {
    -webkit-transform: translateX(0);
    opacity: 1
  }
}

@keyframes start {
  0% {
    -webkit-transform: translateX(200px);
    -ms-transform: translateX(200px);
    -o-transform: translateX(200px);
    transform: translateX(200px);
    opacity: 0
  }

  50% {
    opacity: 1
  }

  100% {
    -webkit-transform: translateX(0);
    -ms-transform: translateX(0);
    -o-transform: translateX(0);
    transform: translateX(0);
    opacity: 1
  }
}

.col1,
.col2,
.col3 {
  width: 99%;
  margin: 1em auto
}


::-webkit-scrollbar {
  width: 20px;
}
 
::-webkit-scrollbar-thumb {
  background: #fff;
}
 
::-webkit-scrollbar-track {
  background: #ddd;
}


.r-page {
  width: 100%;
  height: 100%;
  text-align: center;
  font-size: 2em;
  font-weight: 300;
  position: absolute;
  right: 0;
  top: 0;
  left:0;
  bottom:0;
  opacity: 0;
  color: white;
  z-index: 10;
  padding:10px;

  -webkit-transform-origin: 100% 0%;
  -ms-transform-origin: 100% 0%;
  -o-transform-origin: 100% 0%;
  transform-origin: 100% 0%;
  -webkit-transform: rotateY(-90deg) translateZ(5em);
  -ms-transform: rotateY(-90deg) translateZ(5em);
  -o-transform: rotateY(-90deg) translateZ(5em);
  transform: rotateY(-90deg) translateZ(5em)
}

.s-page {
  color: white;
  z-index: 10;
  text-align: center;
  font-size: 2em;
  font-weight: 300;
}
.page-content{
  overflow-y:auto;
  max-height:100%;
  font-size:.6em;
  padding:.6em;
  text-align:left;
}
/*default colors just in case you don't define these colors on the tiles*/
.s-page, .r-page{
  background-color: white;
  color:black;
}
.page-title {
  margin: .25em 0;
  font-weight: 100;
  font-size: 3em;
  text-align:center;
}

.close-button {
  font-size: 1.5em;
  width: 1em;
  height: 1em;
  position: absolute;
  top: .75em;
  right: .75em;
  cursor: pointer;
  line-height: .8em;
  text-align: center
}

.tile {
  float: left;
  margin: 0 auto 1%;
  color: white;
  font-size: 1.3em;
  text-align: center;
  height: 8em;
  font-weight: 300;
  overflow: hidden;
  cursor: pointer;
  position: relative;
  background-color: #fff;
  color: #333;
  position: relative;
  -webkit-transition: background-color 0.2s ease-out;
  -o-transition: background-color 0.2s ease-out;
  transition: background-color 0.2s ease-out
}
.tile2 {
  float: left;
  margin: 0 auto 1%;
  color: white;
  font-size: 1.3em;
  text-align: center;
  height: 8em;
  font-weight: 300;
  overflow: hidden;
  cursor: pointer;
  position: relative;

  color: #333;
  position: relative;
}

.tile-2xbig {
  height: 16.15em;
  width: 100%
}

.tile-big {
  width: 100%
}

.tile img {
  width: 100%;
  height: 70%
}

.tile-caption {
  position: absolute;
  z-index: 1;
  background-color: #455962;
  color: #fff;
  font-size: 1em;
  padding: 1em;
  text-align: left
}

.caption-bottom {
  left: 0;
  bottom: 0;
  right: 0;
  height: 40%
}

.caption-left {
  left: -100%;
  top: 0;
  bottom: 0;
  width: 40%;
  -webkit-transition: left .3s linear;
  -o-transition: left .3s linear;
  transition: left .3s linear
}

.tile:hover .caption-left {
  left: 0
}

.tile-small {
  width: 49%;
  margin-right: 2%
}

.tile-small.last {
  margin-right: 0
}

.tile div {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  text-align: center;
  display: table;
  padding: 0 1em;
  -webkit-transition: all .3s ease;
  -o-transition: all .3s ease;
  transition: all .3s ease
}

.tile div p {
  display: table-cell;
  vertical-align: middle
}

/*styling the individual tiles*/

.tile-1 {
  background-color: #56D9C9;
  color: white
}

.tile-2 {
  background-color: #455962;
  color: white
}

.tile-2:hover {
  background-color: white;
  color: #455962
}

.tile-3 {
  background-color: #ddd;
  color: #455962
}

.tile-3:hover {
  background-color: white;
  color: #455962
}

.tile-5 {
  background-color: #FCC120;
  color: white
}

.tile-5:hover {
  background-color: #fff;
  color: #FCC120
}

.tile-6 {
  background-color: #3EC7F3;
  color: white
}

.tile-7,
.tile-8 {
  background-color: transparent;
}

.tile-10 {
  background-color: #F0514A;
  color: white
}

.tile-10:hover {
  background-color: white;
  color: #F0514A
}

.tile-10 div {
  text-align: left
}

.tile-3 p {
  font-size: 4em;
  margin-top: .5em
}

.tile-5 p,
.tile-6 p {
  font-size: 2em
}

.tile-5 p span,
.tile-6 p span {
  font-size: 1.3em;
  margin-right: .7em;
  position: relative;
  top: .15em
}

.tile-6 p span {
  margin-right: 1em
}

/* slide text inside tile up */

.slideTextUp div:nth-child(2) {
  top: 100%
}

.slideTextUp:hover div {
  -webkit-transform: translateY(-100%);
  -ms-transform: translateY(-100%);
  -o-transform: translateY(-100%);
  transform: translateY(-100%)
}

.tile-1 p {
  font-size: 1.3em
}

/* slide text inside tile to the right*/

.slideTextRight div:first-child {
  left: -100%
}

.slideTextRight:hover div {
  -webkit-transform: translateX(100%);
  -ms-transform: translateX(100%);
  -o-transform: translateX(100%);
  transform: translateX(100%)
}

/* slide text inside tile to the left */

.slideTextLeft div:nth-child(2) {
  left: 100%
}

.slideTextLeft:hover div {
  -webkit-transform: translateX(-100%);
  -ms-transform: translateX(-100%);
  -o-transform: translateX(-100%);
  transform: translateX(-100%)
}

/* rotate tile in 3D*/

.rotate3d {
  -webkit-perspective: 800px;
  -ms-perspective: 800px;
  -o-perspective: 800px;
  perspective: 800px;
  overflow: visible
}

.faces {
  -webkit-transform-style: preserve-3d;
  -webkit-transition: -webkit-transform 1s;
  -ms-transform-style: preserve-3d;
  -o-transform-style: preserve-3d;
  transform-style: preserve-3d;
  -o-transition: -o-transform 1s;
  transition: -webkit-transform 1s;
  transition: -ms-transform 1s;
  transition: -o-transform 1s;
  transition: transform 1s
}

.faces div {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  -ms-backface-visibility: hidden;
  -o-backface-visibility: hidden;
  backface-visibility: hidden
}
.faces .front{/*default*/
  background-color: #455962;
  color: #ddd;
}
.rotate3dX .front {
  background-color: #455962;
  color: #ddd
}
.rotate3dY .front {
  background-color: #ddd;
  color: #455962;
}

.faces .back {
  background-color: #455962;
  color: #ddd
}

.front span {
  display: inline-block;
  font-size: 4em;
  margin-top: .5em
}

.rotate3dY .back {
  -webkit-transform: rotateY( 180deg );
  -ms-transform: rotateY( 180deg );
  -o-transform: rotateY( 180deg );
  transform: rotateY( 180deg )
}

.rotate3dX .back {
  -webkit-transform: rotateX( 180deg );
  -ms-transform: rotateX( 180deg );
  -o-transform: rotateX( 180deg );
  transform: rotateX( 180deg )
}

.back p {
  padding: 2.5em 3em
}

.rotate3dY:hover .faces:hover {
  -webkit-transform: rotateY( 180deg );
  -ms-transform: rotateY( 180deg );
  -o-transform: rotateY( 180deg );
  transform: rotateY( 180deg )
}

.rotate3dX:hover .faces:hover {
  -webkit-transform: rotateX( 180deg );
  -ms-transform: rotateX( 180deg );
  -o-transform: rotateX( 180deg );
  transform: rotateX( 180deg )
}

.s-page {
  height: 100%;
  width: 100%;
  position: absolute;
  top: 0;
  left: -150%;
  color: white;
  text-align: center;
  font-weight: 300;
  z-index: 1
}

.s-page p {
  font-size: 6em;
  margin-top: 2em;
  font-weight: 100
}

.myform {
  margin: 2em auto;
  width: 300px
}

input {
  display: block;
  line-height: 40px;
  padding: 0 10px;
  width: 260px;
  height: 40px;
  float: left
}

#unlock-button {
  background: black;
  color: white;
  font-size: 1em;
  float: left;
  border: 0;
  height: 2.5em;
  width: 2.5em;
  padding: .3125em;
  text-align: center;
  cursor: pointer;
  border-radius: 2px
}

.delete-button {
  font-size: 0.7em;
  float: right;
  line-height: 25px
}

/*======================= media queries =======================*/

@media screen and (min-width: 43.75em) {
  .col1,
  .col2,
  .col3 {
    float: left;
    margin-right: 1%;
    width: 49%
  }
  .page-title{
    font-size:2.5em;
  }
  .page-content{
    font-size:1em;
  }
  .close-button{
    font-size:2em;
  }
}

@media screen and (min-width: 64em) {
  .col1,
  .col2,
  .col3 {
    float: left;
    margin-right: .5%;
    width: 31%
  }

  .col3 {
    margin-right: 0
  }

  .col1 {
    margin-left: 2em
  }
  .page-title{
    font-size:3.5em;
  }
}


/* prefixed animation keyframes */


@-webkit-keyframes fadeOutBack {
  0% {
    -webkit-transform: translateX(-2em) scale(1);
    transform: translateX(-2em) scale(1);
    opacity: 1
  }

  70% {
    -webkit-transform: translateZ(-5em) scale(0.6);
    transform: translateZ(-5em) scale(0.6);
    opacity: 0.5
  }

  95% {
    -webkit-transform: translateZ(-5em) scale(0.6);
    transform: translateZ(-5em) scale(0.6);
    opacity: 0.5
  }

  100% {
    -webkit-transform: translateZ(-5em) scale(0);
    transform: translateZ(-5em) scale(0);
    opacity: 0
  }
}

@-webkit-keyframes fadeInForward {
  0% {
    -webkit-transform: translateZ(-5em) scale(0);
    transform: translateZ(-5em) scale(0);
    opacity: 0
  }

  100% {
    -webkit-transform: translateZ(0) scale(1);
    transform: translateZ(0) scale(1);
    opacity: 1
  }
}

@-webkit-keyframes rotatePageInFromRight {
  0% {
    -webkit-transform: rotateY(-90deg) translateZ(5em);
    transform: rotateY(-90deg) translateZ(5em);
    opacity: 0
  }

  30% {
    opacity: 1
  }

  100% {
    -webkit-transform: rotateY(0deg) translateZ(0);
    transform: rotateY(0deg) translateZ(0);
    opacity: 1
  }
}

@-webkit-keyframes slidePageLeft {
  0% {
    left: 0;
    -webkit-transform: rotateY(0deg) translateZ(0);
    transform: rotateY(0deg) translateZ(0);
    opacity: 1
  }

  70% {
    opacity: 1
  }

  100% {
    opacity: 0;
    left: -150%;
    -webkit-transform: rotateY(0deg);
    transform: rotateY(0deg)
  }
}

@-webkit-keyframes slidePageInFromLeft {
  0% {
    opacity: 0
  }

  30% {
    opacity: 1
  }

  100% {
    opacity: 1;
    left: 0
  }
}

@-webkit-keyframes slidePageBackLeft {
  0% {
    opacity: 1;
    left: 0;
    -webkit-transform: scale(0.95);
    transform: scale(0.95)
  }

  10% {
    -webkit-transform: scale(0.9);
    transform: scale(0.9)
  }

  70% {
    opacity: 1
  }

  100% {
    opacity: 0;
    left: -150%
  }
}

@-o-keyframes fadeOutBack {
  0% {
    -webkit-transform: translateX(-2em) scale(1);
    -ms-transform: translateX(-2em) scale(1);
    -o-transform: translateX(-2em) scale(1);
    transform: translateX(-2em) scale(1);
    opacity: 1
  }

  70% {
    -webkit-transform: translateZ(-5em) scale(0.6);
    -ms-transform: translateZ(-5em) scale(0.6);
    -o-transform: translateZ(-5em) scale(0.6);
    transform: translateZ(-5em) scale(0.6);
    opacity: 0.5
  }

  95% {
    -webkit-transform: translateZ(-5em) scale(0.6);
    -ms-transform: translateZ(-5em) scale(0.6);
    -o-transform: translateZ(-5em) scale(0.6);
    transform: translateZ(-5em) scale(0.6);
    opacity: 0.5
  }

  100% {
    -webkit-transform: translateZ(-5em) scale(0);
    -ms-transform: translateZ(-5em) scale(0);
    -o-transform: translateZ(-5em) scale(0);
    transform: translateZ(-5em) scale(0);
    opacity: 0
  }
}

@-o-keyframes fadeInForward {
  0% {
    -webkit-transform: translateZ(-5em) scale(0);
    -ms-transform: translateZ(-5em) scale(0);
    -o-transform: translateZ(-5em) scale(0);
    transform: translateZ(-5em) scale(0);
    opacity: 0
  }

  100% {
    -webkit-transform: translateZ(0) scale(1);
    -ms-transform: translateZ(0) scale(1);
    -o-transform: translateZ(0) scale(1);
    transform: translateZ(0) scale(1);
    opacity: 1
  }
}

@-o-keyframes rotatePageInFromRight {
  0% {
    -webkit-transform: rotateY(-90deg) translateZ(5em);
    -ms-transform: rotateY(-90deg) translateZ(5em);
    -o-transform: rotateY(-90deg) translateZ(5em);
    transform: rotateY(-90deg) translateZ(5em);
    opacity: 0
  }

  30% {
    opacity: 1
  }

  100% {
    -webkit-transform: rotateY(0deg) translateZ(0);
    -ms-transform: rotateY(0deg) translateZ(0);
    -o-transform: rotateY(0deg) translateZ(0);
    transform: rotateY(0deg) translateZ(0);
    opacity: 1
  }
}

@-o-keyframes slidePageLeft {
  0% {
    left: 0;
    -webkit-transform: rotateY(0deg) translateZ(0);
    -ms-transform: rotateY(0deg) translateZ(0);
    -o-transform: rotateY(0deg) translateZ(0);
    transform: rotateY(0deg) translateZ(0);
    opacity: 1
  }

  70% {
    opacity: 1
  }

  100% {
    opacity: 0;
    left: -150%;
    -webkit-transform: rotateY(0deg);
    -ms-transform: rotateY(0deg);
    -o-transform: rotateY(0deg);
    transform: rotateY(0deg)
  }
}

@-o-keyframes slidePageInFromLeft {
  0% {
    opacity: 0
  }

  30% {
    opacity: 1
  }

  100% {
    opacity: 1;
    left: 0
  }
}

@-o-keyframes slidePageBackLeft {
  0% {
    opacity: 1;
    left: 0;
    -webkit-transform: scale(0.95);
    -ms-transform: scale(0.95);
    -o-transform: scale(0.95);
    transform: scale(0.95)
  }

  10% {
    -webkit-transform: scale(0.9);
    -ms-transform: scale(0.9);
    -o-transform: scale(0.9);
    transform: scale(0.9)
  }

  70% {
    opacity: 1
  }

  100% {
    opacity: 0;
    left: -150%
  }
}

@-o-keyframes start {
  0% {
    -webkit-transform: translateX(200px);
    opacity: 0
  }

  50% {
    opacity: 1
  }

  100% {
    -webkit-transform: translateX(0);
    opacity: 1
  }

}

/* login start */
.login-form {
    width: 340px;
    margin: 50px auto;
  	font-size: 15px;
}
.login-form form {
    margin-bottom: 15px;
    background-color: rgba(255,255,255,0.3) !important;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.login-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
}
.btn {        
    font-size: 15px;
    font-weight: bold;
}
/* login ends */

</style>

<div class="demo-wrapper">

<!--each tile should specify what page type it opens (to determine which animation) and the corresponding page name it should open-->
  <div class="dashboard clearfix">
    <ul class="tiles">
      <div class="col1 clearfix">
        <li class="tile tile-big tile-5" data-page-type="r-page" data-page-name="random-r-page">
          <div>
          <!-- <p><span class="glyphicon glyphicon-asterisk"></span>LIFE FITNESS GYMS</p> -->
          <img src="img/logo-t.png" alt="Life Fitness Gyms">
          </div>
        </li>
        <li class="tile tile-small title tile-2" data-page-type="s-page" data-page-name="random-r-page">
          <div><p>FITNESS BLOG</p></div>
        </li>
        <li class="tile tile-small last tile-2" data-page-type="s-page" data-page-name="random-r-page">
          <div><p>ONLINE STORE</p></div>
        </li>
        <li class="tile tile-small title tile-2" data-page-type="s-page" data-page-name="random-r-page">
          <div><p>ONLINE COACHING</p></div>
        </li>
      </div>

      <div class="col2 clearfix">
      <li class="tile tile-small tile tile-2" data-page-type="s-page" data-page-name ="random-restored-page">
          <div><p>ABOUT US</p></div>
        </li>
      <li class="tile tile-small last tile-2" data-page-type="s-page" data-page-name ="random-restored-page">
          <div><p>CONTACT US</p></div>
        </li>
      </div>

      <div class="col3 clearfix">  
      <li class="tile tile-big tile-1 slideTextUp" data-page-type="r-page" data-page-name="random-r-page">
          <div><p>GYM CLOSED</p></div>
          <div><p>Trainer Unavailable</p></div>
        </li>  
        <div class="tile2 tile-2xbig tile-9 ">
          <!-- <figure>
            <img src="img/img2.jpg" />
            <figcaption class="tile-caption caption-bottom">LOGIN FORM
          </figure> -->
        
          <div class="login-form">
            <form action="" method="POST">     
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Username" required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block">Log In</button>
                </div>
                <!-- <div class="clearfix">
                    <a href="#" class="float-right">Forgot Password?</a>
                </div>         -->
            </form>
            <!-- <form action="{{url('post-login')}}" method="POST">

            {{ csrf_field() }}

                <div class="input-group form-group">
                    <input type="text" class="form-control" placeholder="email" name="email" required="required">	

                </div>
                <div class="input-group form-group">
                    <input type="password" class="form-control" placeholder="password" name="password" required="required">

                </div>
                <div class="form-group">
                    <button type="submit" class="btn float-left login_btn" >Login</button>
                
                </div>
                <a href="#" class = "link">Forgot password?</a>
            </form> -->
            </div>

        </div>

      </div>
    </ul>
  </div><!--end dashboard-->

</div>






{{--
<div class="demo-wrapper">

<!--each tile should specify what page type it opens (to determine which animation) and the corresponding page name it should open-->
  <div class="dashboard clearfix">
    <ul class="tiles">
      <div class="col1 clearfix">
        <li class="tile tile-big tile-5" data-page-type="r-page" data-page-name="random-r-page">
          <div>
          <p><span class="glyphicon glyphicon-asterisk"></span>LIFE FITNESS GYMS</p>
          <!-- <img src="img/logo-t.png" alt="Life Fitness Gyms"> -->
          </div>
        </li>
        <li class="tile tile-small tile tile-2 slideTextRight" data-page-type="s-page" data-page-name ="random-restored-page">
          <div><p class="glyphicon glyphicon-asterisk"></p></div>
          <div><p>Tile's content slides right. Page opens from left</p></div>
        </li>
        <li class="tile tile-small last tile-3" data-page-type="r-page" data-page-name="random-r-page">
          <p class="glyphicon glyphicon-asterisk"></p>
        </li>
        <li class="tile tile-big tile-4 fig-tile" data-page-type="r-page" data-page-name="random-r-page">
          <figure>
            <img src="img/img1.jpg" />
            <figcaption class="tile-caption caption-left">Slide-out Caption from left</figcaption>
          </figure>
        </li>
      </div>

      <div class="col2 clearfix">
      <li class="tile tile-big tile-1 slideTextUp" data-page-type="r-page" data-page-name="random-r-page">
          <div><p>This tile's content slides up</p></div>
          <div><p>View all tasks</p></div>
        </li>
        <li class="tile tile-big tile-6 slideTextLeft" data-page-type="r-page" data-page-name="random-r-page">
          <div><p><span class="glyphicon glyphicon-asterisk"></span>Skype</p></div>
          <div><p>Make a Call</p></div>
        </li>
        <!--Tiles with a 3D effect should have the following structure:
            1) a container inside the tile with class of .faces
            2) 2 figure elements, one with class .front and the other with class .back-->
        <li class="tile tile-small tile-7 rotate3d rotate3dX" data-page-type="r-page" data-page-name="random-r-page">
          <div class="faces">
            <div class="front"><span class="glyphicon glyphicon-asterisk"></span></div>
            <div class="back"><p>Launch Picassa</p></div>
          </div>
        </li>
        <li class="tile tile-small last tile-8 rotate3d rotate3dY" data-page-type="r-page" data-page-name="random-r-page">
          <div class="faces">
            <div class="front"><span class="glyphicon glyphicon-asterisk"></span></div>
            <div class="back"><p>Launch Instagram</p></div>
          </div>
        </li>
      </div>

      <div class="col3 clearfix">  
        <li class="tile tile-big tile-10" data-page-type="s-page" data-page-name="custom-page">
          <div><p>GYM OPEN <br> Trainer Sandeepa</p></div>
        </li>    
        <li class="tile tile-2xbig tile-9 fig-tile" data-page-type="custom-page" data-page-name="random-r-page">
          <figure>
            <img src="img/img2.jpg" />
            <figcaption class="tile-caption caption-bottom">LOGIN FORM
            
            </figure>
        </li>

      </div>
    </ul>
  </div><!--end dashboard-->

</div>
--}}

@endsection