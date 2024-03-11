<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
<style>
/* Styling for the modal container */
.modal {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5); /* semi-transparent black background */
}

/* Styling for the modal content */
.modal-content {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: white;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

/* Styling for the close button (x) */
.close {
  position: absolute;
  top: 10px;
  right: 10px;
  font-size: 24px;
  cursor: pointer;
}


.dropdown {
  position: relative;
  display: inline-block;
  float:right;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}
    * {
  outline: none;
}

body {
  margin: 40px 0px;
  background-color: #385591;
}

body,
input,
button {
  font-family: Helvetica;
}

img {
  display: block;
  width: 100%;
  border: 0;
}

.tb {
  display: table;
  width: 100%;
}

.tr {
  display: table-row;
}

.td {
  display: table-cell;
  vertical-align: middle;
}

a {
  text-decoration: none;
}

button {
  padding: 0;
  border: 0;
  background-color: transparent;
}

::placeholder {
  color: #f1f1f1;
}

main {
  width: 1280px;
  margin: 0 auto;
  background-color: #e9ebee;
  box-shadow: 0px 8px 30px #1d2d4f;
  border-radius: 4px;
  overflow: hidden;
}

#device-bar-1 {
  text-align: right;
  padding: 6px;
  background-color: #000;
  overflow: hidden;
}

#device-bar-1 button {
  width: 15px;
  height: 15px;
  float: left;
  margin: 6px;
  border-radius: 50%;
  cursor: pointer;
}

#device-bar-1 button:first-child {
  background-color: #f35d5b;
}

#device-bar-1 button:nth-child(2) {
  background-color: #f6bd3a;
}

#device-bar-1 button:last-child {
  background-color: #44cc45;
}

/* Header */
header {
  padding: 15px 20px;
  background-color: #4267b2;
}

#logo {
  width: 30px;
}

#logo a {
  display: block;
}

#logo a i {
  font-size: 34px;
  color: #fff;
}

#search-form form {
  position: relative;
  width: 280px;
  font-size: 16px;
  padding: 8px 15px;
  padding-right: 37px;
  background-color: #3b5ca0;
  border-radius: 20px;
  margin-left: 15px;
}

#search-form form input {
  width: 100%;
  color: #fff;
  border: 0;
  background-color: transparent;
}

#search-form form button {
  position: absolute;
  top: 6px;
  right: 6px;
  color: #f1f1f1;
  height: 22px;
  line-height: 1;
  cursor: pointer;
}

#search-form form button i {
  font-size: 22px;
}

#f-name-l {
  width: 1px;
  color: #fff;
  font-weight: bold;
  white-space: pre;
  padding-right: 20px;
}

#f-name-l span {
  padding-right: 28px;
  border-right: 1px solid #35518b;
}

#i-links {
  width: 1px;
}

#m-td {
  padding-right: 20px;
}

#m-td span {
  position: relative;
  cursor: pointer;
}

#m-td span.m-active:before {
  content: "5";
  position: absolute;
  top: -8px;
  right: 0px;
  color: #fff;
  font-size: 12px;
  padding: 4px 4px 3px 4px;
  background-color: #ff1e0e;
  border-radius: 3px;
  line-height: 1;
}

#i-links i {
  color: #fff;
  font-size: 24px;
  padding: 0px 8px;
  vertical-align: middle;
}

#p-link {
  display: block;
  width: 34px;
  height: 34px;
  background-color: #f1f1f1;
  border-radius: 50%;
  overflow: hidden;
}

#p-link img {
  width: 100%;
}

/* Header finished */

/* Profile image header */
#profile-upper {
  position: relative;
}

#profile-d {
  position: absolute;
  left: 59px;
  bottom: 0px;
  right: 0px;
  height: 180px;
  z-index: 2;
}

#profile-banner-image {
  height: 360px;
  overflow: hidden;
  z-index: 1;
}

#profile-banner-image img {
  width: 100%;
  margin-top: -5%;
}

#profile-pic {
  width: 180px;
  height: 180px;
  border-radius: 3px;
  margin-top: 28px;
  overflow: hidden;
  box-shadow: 0 0 0 5px #fff;
}

#profile-pic img {
  width: 100%;
}

#u-name {
  position: absolute;
  top: 120px;
  left: 208px;
  color: #fff;
  font-size: 36px;
  font-weight: bold;
}

#m-btns {
  position: absolute;
  right: 56px;
  bottom: 20px;
  width: 211px;
}

#m-btns .td {
  padding: 0 8px;
}

.m-btn {
  cursor: pointer;
  color: #0e0e0e;
  font-size: 14px;
  white-space: pre;
  padding: 5px 8px 6px 8px;
  background-color: rgba(255, 255, 255, 0.7);
  border-radius: 2px;
}

.m-btn i {
  font-size: 16px;
  margin-right: 1px;
  vertical-align: middle;
}

.m-btn span {
  position: relative;
  top: 1px;
}

#edit-profile {
  position: absolute;
  right: 20px;
  bottom: 21px;
  line-height: 1;
  cursor: pointer;
}

#edit-profile i {
  display: block;
  color: rgba(255, 255, 255, 0.7);
}

#black-grd {
  position: absolute;
  left: 0px;
  bottom: 0px;
  right: 0px;
  height: 300px;
  background: linear-gradient(rgba(0, 0, 0, 0) 71%, rgba(0, 0, 0, 0.53));
  z-index: 1;
}
/* Profile image header finished */

/* Content area */
#main-content {
  padding: 55px 0px 0px 55px;
}

#l-col,
#m-col,
#r-col {
  vertical-align: top;
}

#l-col {
  width: 340px;
  padding-top: 6px;
}

.l-cnt {
  padding: 20px;
  background-color: #fff;
  box-shadow: 0px 3px 3px #ddd;
}

.l-mrg {
  margin-top: 28px;
}
.l-i {
  display: inline-block;
  width: 24px;
  height: 24px;
  margin-right: 2px;
  background-size: auto;
  background-repeat: no-repeat;
  vertical-align: middle;
}

#l-i-i {
  background-image: url("https://imagizer.imageshack.com/img922/7749/C8tmwX.png");
  background-position: 0 -87px;
}

#l-i-p {
  background-image: url("https://imagizer.imageshack.com/img923/7847/sRapnM.png");
  background-position: 0 0;
}

#l-i-k {
  background-image: url("https://imagizer.imageshack.com/img922/5617/QpPVKn.png");
}

.cnt-label {
  position: relative;
  padding-right: 24px;
  margin-bottom: 15px;
}

.cnt-label span {
  position: relative;
  top: 2px;
  color: #707070;
  font-size: 18px;
}

.lb-action {
  position: absolute;
  top: 0px;
  right: 0px;
  cursor: pointer;
}

.lb-action i {
  display: block;
  color: #ccc;
  font-size: 18px;
}

#b-i i {
  font-size: 24px;
}

#i-box {
  color: #797979;
  font-size: 14px;
  line-height: 1.3;
}

#intro-line {
  margin-top: 17px;
}

#u-occ {
  margin: 10px 0px;
}

#u-occ a {
  color: #2196f3;
}

#u-loc i {
  color: #2196f3;
  font-size: 16px;
  margin-left: -3px;
  margin-right: 2px;
  margin-top: -1px;
  vertical-align: middle;
}

#u-loc a {
  position: relative;
  top: 1px;
  color: #2196f3;
}

#photos {
  padding: 2px;
  margin: 15px -20px -20px -20px;
}

#photos .td {
  width: 33.333%;
  height: 112px;
  border: 2px solid #fff;
  box-sizing: border-box;
  background-color: #f1f1f1;
  background-position: 50% 25%;
  background-size: cover;
}

#photos .tb .tr:nth-child(1) .td:nth-child(1) {
  background-image: url("https://imagizer.imageshack.com/img922/8637/NN4aPj.jpg");
}

#photos .tb .tr:nth-child(1) .td:nth-child(2) {
  background-image: url("https://imagizer.imageshack.com/img923/528/iJy0X5.jpg");
}

#photos .tb .tr:nth-child(1) .td:nth-child(3) {
  background-image: url("https://imagizer.imageshack.com/img923/9781/26phSy.jpg");
}

#photos .tb .tr:nth-child(2) .td:nth-child(1) {
  background-image: url("https://imagizer.imageshack.com/img921/8417/svxO7y.jpg");
}

#photos .tb .tr:nth-child(2) .td:nth-child(2) {
  background-image: url("https://imagizer.imageshack.com/img921/6488/i2Hb4U.jpg");
}

#photos .tb .tr:nth-child(2) .td:nth-child(3) {
  background-image: url("https://imagizer.imageshack.com/img921/2453/J7PICR.jpg");
}

#photos .tb .tr:nth-child(3) .td:nth-child(1) {
  background-image: url("https://imagizer.imageshack.com/img921/3021/8uZZY2.jpg");
}

#photos .tb .tr:nth-child(3) .td:nth-child(2) {
  background-image: url("https://imagizer.imageshack.com/img923/3992/22mL29.jpg");
}

#photos .tb .tr:nth-child(3) .td:nth-child(3) {
  background-image: url("https://imagizer.imageshack.com/img921/2711/JXSt41.jpg");
}

#k-nm {
  color: #b8b8b8;
  font-size: 15px;
  font-style: normal;
  margin-left: 8px;
  cursor: pointer;
}

.q-ad-c {
  padding: 2px;
}

.q-ad {
  display: block;
  padding: 8px;
  border: 1px solid #eeeeee;
  background-color: #fafafa;
  border-radius: 4px;
}

.q-ad img {
  display: inline;
  width: 24px;
  height: 24px;
  margin-right: 5px;
  vertical-align: middle;
}

.q-ad span {
  position: relative;
  top: 1px;
  color: #242424;
  font-size: 14px;
  text-align: center;
}

#add_q {
  color: #858585;
  text-align: center;
  margin-top: 10px;
  background-color: #fff;
  border-color: #f1f1f1;
}

#add_q i {
  font-size: 17px;
  margin-right: -3px;
  vertical-align: middle;
}

#add_q span {
  color: #858585;
  font-size: 12.4px;
  position: relative;
  top: -1px;
}

#t-box {
  font-size: 14px;
  color: #686868;
  padding-top: 24px;
  line-height: 18px;
}

#t-box a {
  margin-right: 5px;
}

#t-box a,
#t-more {
  color: #999;
}

#t-more {
  cursor: pointer;
}

#t-more i {
  font-size: 15px;
  vertical-align: middle;
}

#cpy-nt {
  margin-top: 4px;
}

#m-col {
  padding: 0px 55px;
}

.m-mrg {
  margin-bottom: 28px;
}

#p-tabs {
  position: relative;
  font-size: 13px;
  color: #919191;
  text-align: center;
  padding: 13px 20px;
  margin-top: -64px;
  background-color: #fff;
  box-shadow: 0px 3px 3px #ddd;
  z-index: 3;
}

#p-tabs-m .td {
  width: 16.6666667%;
  cursor: pointer;
}

#p-tabs-m .td.active {
  color: #ee6000;
}

#p-tabs-m span {
  position: relative;
}

#p-tabs-m .td.active span:after {
  content: "";
  position: absolute;
  left: 0px;
  right: 0px;
  bottom: -13px;
  height: 4px;
  background-color: #ee6000;
}

#p-tabs-m .td i {
  display: block;
  font-size: 24px;
  margin-bottom: 5px;
}

#p-tab-m {
  width: 1px;
  color: #ccc;
  cursor: pointer;
}

#p-tab-m i {
  margin-right: -4px;
}

#composer {
  padding: 20px;
  background-color: #fff;
  box-shadow: 0px 3px 3px #ddd;
  border-radius:20px;
}

#c-tabs-cvr {
  padding-bottom: 12px;
  border-bottom: 1px solid #ececec;
}

#c-tabs {
  width: auto;
  color: #919191;
}

#c-tabs .td {
  position: relative;
  width: 1px;
  padding: 0px 15px;
  white-space: pre;
  cursor: pointer;
}

#c-tabs .td:after {
  content: "";
  position: absolute;
  top: 50%;
  right: 0px;
  width: 1px;
  height: 12px;
  margin-top: -6px;
  background-color: #eaeaea;
}

#c-tabs .td:first-child {
  padding-left: 0px;
}

#c-tabs .td:last-child {
  padding-right: 0;
}

#c-tabs .td:last-child:after {
  display: none;
}

#c-tabs .td span {
  position: relative;
}

#c-tabs .td.active {
  color: #373737;
}

#c-tabs .td.active span:after {
  content: "";
  position: absolute;
  left: 0px;
  right: 0px;
  bottom: -20px;
  width: 10px;
  height: 10px;
  border: 1px solid transparent;
  border-color: transparent #ececec #ececec transparent;
  margin: 0 auto;
  background-color: #fff;
  transform: rotateZ(45deg);
}

#c-tabs .td i {
  font-size: 21px;
  margin-right: 4px;
  vertical-align: middle;
}

#c-tabs .td span {
  position: relative;
  top: 1px;
  font-size: 15px;
}

#c-c-main {
  position: relative;
  padding-top: 15px;
}

#p-c-i {
  width: 65px !important;
  border-radius: 50%;
  overflow: hidden;
}

#p-c-i img {
  display: block;
  width: 100%;
}

#c-inp {
  padding-left: 20px;
}

#c-inp input {
  width: 100%;
  font-size: 20px;
  border: 0;
  padding: 0;
  margin: 0;
}

#c-c-main input::placeholder {
  color: #666;
}

#insert_emoji {
  position: absolute;
  right: -2px;
  bottom: -10px;
  cursor: pointer;
}

#insert_emoji i {
  display: block;
  color: #ccced6;
  font-size: 21px;
}

.post {
  padding: 20px;
  background-color: #fff;
  box-shadow: 0px 3px 3px #ddd;
}

.p-p-pic {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  overflow: hidden;
}

.p-p-pic img {
  width: 100%;
  display: block;
  border: 0;
  height: 50px;
}

.p-r-hdr {
  vertical-align: top;
  padding-left: 20px;
}

.p-u-info {
  color: #5a5959;
  font-size: 15px;
  margin-bottom: 7px;
}

.p-u-info a {
  color: #4267b2;
}

.p-dt {
  color: #a8a8a8;
  font-size: 13px;
}

.p-dt i {
  font-size: 14px;
  margin-right: 2px;
}

.p-dt span {
  position: relative;
  top: -2px;
}

.p-opt {
  position: relative;
  right: -3px;
  width: 1px;
  color: #ccc;
  cursor: pointer;
  vertical-align: top;
}

.p-cnt-v {
  display: block;
  margin: 20px -20px;
  cursor: pointer;
}

/* .p-acts {
  overflow: hidden;
} */

.p-act {
  width: 24px;
  height: 24px;
  color: #a3a6aa;
  cursor: pointer;
}

.p-act span {
  position: relative;
  top: 1px;
  width: 20px;
  font-size: 15px;
  color: #a3a6aa;
}

.like {
  margin-right: 220px;
}

.like,
.comment {
  width: 50px;
  float: left;
}

.p-act i {
  vertical-align: middle;
}

.like i,
.comment i {
  margin-right: 6px;
}

.share {
  float: right;
  /* transform: rotateY(180deg); */
  margin-right: 20px;
}


.custom-file-upload {
  display: inline-block;
  background-color: rgba(40, 0, 255, 1);
  color: #fff;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
  text-align: center;
}

.custom-file-upload i {
  margin-right: 10px;
}

.custom-file-upload span {
  font-weight: bold;
}

.custom-file-upload input[type="file"] {
  display: none;
}

#loading {
  text-align: center;
  padding: 40px 0px;
}

#loading i {
  color: #4267b2;
  font-size: 32px;
  display: block;
}
/* Content area finished */

/* Chat bar */
#r-col {
  position: relative;
  width: 150px;
}

#chat-bar {
  position: absolute;
  top: -55px;
  right: 55px;
  bottom: 0px;
  left: 0px;
}

#chat-lb {
  color: #3a5795;
  font-size: 16px;
  text-align: center;
  margin: 23px 0px;
}

#chat-lb i {
  font-size: 18px;
  margin-right: 4px;
  vertical-align: middle;
}

#chat-lb span {
  position: relative;
  top: 2px;
}

.on-ct {
  position: relative;
  width: 50px;
  height: 50px;
  margin: 28px auto 0 auto;
  border-radius: 50%;
}

#cts .on-ct:first-child {
  margin-top: 0px;
}

.on-ct img {
  border-radius: 50%;
}

.on-ct.active:after {
  content: "";
  position: absolute;
  top: 3px;
  right: 2px;
  width: 10px;
  height: 10px;
  background-color: #2ecd18;
  border-radius: 50%;
  box-shadow: 0px 0px 0px 3px #e9ebee;
  z-index: 1;
}

#ct-sett {
  margin-top: 55px;
}

#ct-sett i {
  color: #3a5795;
  padding: 13px;
  background-color: #d8e4ff;
  border-radius: 50%;
  cursor: pointer;
}
/* Chat bar finished */

/* Footer */
#device-bar-2 {
  padding: 9px 0px 13px 0px;
  background-color: #000;
}

#device-bar-2 i {
  display: block;
  width: 40px;
  color: #fff;
  font-size: 40px;
  text-align: center;
  margin: 0 auto;
}
/* Footer finished */

</style>



</head>
<body>
    

<main>
  <div id="device-bar-1">
    
  </div>
 
  <header>
    <div class="tb">
      <div class="td" id="logo">
      <a href="#" style="text-align:center;color:#0f71f1;font-size:30px;background-color:white;padding:5px;border-radius: 5px;"><i class=""></i>Chatbook</a>
      </div>
    </div>
  </header>

  <!-- cover image -->
  
     
        <div id="t-box">
        </div>
      </div>
      <div class="td" id="m-col">
     
       
      
        <div class="m-mrg" id="composer" >
         
          <div id="c-c-main">
            <div class="tb" style="width:1100px;">

 <!-- ss -->


 <?php
// session_start(); //its included in autoload.php flle
// print_r($_SESSION);
// unset($_SESSION['mybook_userid']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profile</title>

<style>
body {
padding: 0;
margin: 0;
}

#blue_bar {
background-color: #8e44ad;
height: 50px;
color: white;

}

#searchbox {
width: 400px;
height: 20px;
border-radius: 5px;
border: none;
padding: 4px;
font-size: 14px;
background-image: url(search.png);
background-repeat: no-repeat;
background-position: right;
}

#profile_pic {
width: 150px;

border-radius: 50%;
border: 2px solid white;
}

#menu_buttons {
width: 100px;

display: inline-block;
margin: 2px;
}

#friends_img {
width: 75px;
float: left;
margin: 8px;
}

#friends_bar {

min-height: 400px;
margin-top: 20px;
color: #aaa;
padding: 8px;
text-align: center;
font-size: 20px;
color: #ff00b3;

}

#friends {
clear: both;
font-size: 12px;
font-weight: bold;
color: #ff00b3;
}

textarea{
    width:100%;
    border:none;
    font-family: tahoma;
    font-size: 14px;
    height: 60px;
}

#post_button{
    float: right;
    background-color: #ff00b3;
    border: none;
    color: #fff;
    padding: 4px;
    font-size: 14px;
    border-radius: 2px;
    width: 50px;
}

#post_bar{
    background-color: white;
    margin-top: 20px;
    padding-top: 10px;
}
#post{
    padding: 4px;
    font-size:13px;
    display: flex;
    margin-bottom: 20px;
}


.modal {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5); /* semi-transparent black background */
}

/* Styling for the modal content */
.modal-content {
  position: absolute;
  top: 50%;
  left: 300%;
  transform: translate(-50%, -50%);
  background-color: white;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  width: 350px;
}

/* Styling for the close button (x) */
.close {
  position: absolute;
  top: 10px;
  right: 10px;
  font-size: 24px;
  cursor: pointer;
}


.dropdown {
  position: relative;
  display: inline-block;
  float:right;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}
    * {
  outline: none;
}

body {
  margin: 40px 0px;
  background-color: #385591;
}

body,
input,
button {
  font-family: Helvetica;
}

img {
  display: block;
  width: 100%;
  border: 0;
}

.tb {
  display: table;
  width: 100%;
}

.tr {
  display: table-row;
}

.td {
  display: table-cell;
  vertical-align: middle;
}

a {
  text-decoration: none;
}

button {
  padding: 0;
  border: 0;
  background-color: transparent;
}

::placeholder {
  color: #f1f1f1;
}

main {
  width: 1280px;
  margin: 0 auto;
  background-color: #e9ebee;
  box-shadow: 0px 8px 30px #1d2d4f;
  border-radius: 4px;
  overflow: hidden;
}

#device-bar-1 {
  text-align: right;
  padding: 6px;
  background-color: #000;
  overflow: hidden;
}

#device-bar-1 button {
  width: 15px;
  height: 15px;
  float: left;
  margin: 6px;
  border-radius: 50%;
  cursor: pointer;
}

#device-bar-1 button:first-child {
  background-color: #f35d5b;
}

#device-bar-1 button:nth-child(2) {
  background-color: #f6bd3a;
}

#device-bar-1 button:last-child {
  background-color: #44cc45;
}

/* Header */
header {
  padding: 15px 20px;
  background-color: #4267b2;
}

#logo {
  width: 30px;
}

#logo a {
  display: block;
}

#logo a i {
  font-size: 34px;
  color: #fff;
}

#search-form form {
  position: relative;
  width: 280px;
  font-size: 16px;
  padding: 8px 15px;
  padding-right: 37px;
  background-color: #3b5ca0;
  border-radius: 20px;
  margin-left: 15px;
}

#search-form form input {
  width: 100%;
  color: #fff;
  border: 0;
  background-color: transparent;
}

#search-form form button {
  position: absolute;
  top: 6px;
  right: 6px;
  color: #f1f1f1;
  height: 22px;
  line-height: 1;
  cursor: pointer;
}

#search-form form button i {
  font-size: 22px;
}

#f-name-l {
  width: 1px;
  color: #fff;
  font-weight: bold;
  white-space: pre;
  padding-right: 20px;
}

#f-name-l span {
  padding-right: 28px;
  border-right: 1px solid #35518b;
}

#i-links {
  width: 1px;
}

#m-td {
  padding-right: 20px;
}

#m-td span {
  position: relative;
  cursor: pointer;
}

#m-td span.m-active:before {
  content: "5";
  position: absolute;
  top: -8px;
  right: 0px;
  color: #fff;
  font-size: 12px;
  padding: 4px 4px 3px 4px;
  background-color: #ff1e0e;
  border-radius: 3px;
  line-height: 1;
}

#i-links i {
  color: #fff;
  font-size: 24px;
  padding: 0px 8px;
  vertical-align: middle;
}

#p-link {
  display: block;
  width: 34px;
  height: 34px;
  background-color: #f1f1f1;
  border-radius: 50%;
  overflow: hidden;
}

#p-link img {
  width: 100%;
}

/* Header finished */

/* Profile image header */
#profile-upper {
  position: relative;
}

#profile-d {
  position: absolute;
  left: 59px;
  bottom: 0px;
  right: 0px;
  height: 180px;
  z-index: 2;
}

#profile-banner-image {
  height: 360px;
  overflow: hidden;
  z-index: 1;
}

#profile-banner-image img {
  width: 100%;
  margin-top: -5%;
}

#profile-pic {
  width: 180px;
  height: 180px;
  border-radius: 3px;
  margin-top: 28px;
  overflow: hidden;
  box-shadow: 0 0 0 5px #fff;
  border-radius:100px;
}

#profile-pic img {
  width: 100%;
}

#u-name {
  position: absolute;
  top: 90px;
  left: 208px;
  color: #fff;
  font-size: 36px;
  font-weight: bold;
}

#m-btns {
  position: absolute;
  right: 56px;
  bottom: 20px;
  width: 211px;
}

#m-btns .td {
  padding: 0 8px;
}

.m-btn {
  cursor: pointer;
  color: #0e0e0e;
  font-size: 14px;
  white-space: pre;
  padding: 5px 8px 6px 8px;
  background-color: rgba(255, 255, 255, 0.7);
  border-radius: 2px;
}

.m-btn i {
  font-size: 16px;
  margin-right: 1px;
  vertical-align: middle;
}

.m-btn span {
  position: relative;
  top: 1px;
}

#edit-profile {
  position: absolute;
  right: 20px;
  bottom: 21px;
  line-height: 1;
  cursor: pointer;
}

#edit-profile i {
  display: block;
  color: rgba(255, 255, 255, 0.7);
}

#black-grd {
  position: absolute;
  left: 0px;
  bottom: 0px;
  right: 0px;
  height: 300px;
  background: linear-gradient(rgba(0, 0, 0, 0) 71%, rgba(0, 0, 0, 0.53));
  z-index: 1;
}
/* Profile image header finished */

/* Content area */
#main-content {
  padding: 55px 0px 0px 55px;
}

#l-col,
#m-col,
#r-col {
  vertical-align: top;
}

#l-col {
  width: 340px;
  padding-top: 6px;
}

.l-cnt {
  padding: 20px;
  background-color: #fff;
  box-shadow: 0px 3px 3px #ddd;
}

.l-mrg {
  margin-top: 28px;
}
.l-i {
  display: inline-block;
  width: 24px;
  height: 24px;
  margin-right: 2px;
  background-size: auto;
  background-repeat: no-repeat;
  vertical-align: middle;
}

#l-i-i {
  background-image: url("https://imagizer.imageshack.com/img922/7749/C8tmwX.png");
  background-position: 0 -87px;
}

#l-i-p {
  background-image: url("https://imagizer.imageshack.com/img923/7847/sRapnM.png");
  background-position: 0 0;
}

#l-i-k {
  background-image: url("https://imagizer.imageshack.com/img922/5617/QpPVKn.png");
}

.cnt-label {
  position: relative;
  padding-right: 24px;
  margin-bottom: 15px;
}

.cnt-label span {
  position: relative;
  top: 2px;
  color: #707070;
  font-size: 18px;
}

.lb-action {
  position: absolute;
  top: 0px;
  right: 0px;
  cursor: pointer;
}

.lb-action i {
  display: block;
  color: #ccc;
  font-size: 18px;
}

#b-i i {
  font-size: 24px;
}

#i-box {
  color: #797979;
  font-size: 14px;
  line-height: 1.3;
}

#intro-line {
  margin-top: 17px;
}

#u-occ {
  margin: 10px 0px;
}

#u-occ a {
  color: #2196f3;
}

#u-loc i {
  color: #2196f3;
  font-size: 16px;
  margin-left: -3px;
  margin-right: 2px;
  margin-top: -1px;
  vertical-align: middle;
}

#u-loc a {
  position: relative;
  top: 1px;
  color: #2196f3;
}

#photos {
  padding: 2px;
  margin: 15px -20px -20px -20px;
}

#photos .td {
  width: 33.333%;
  height: 112px;
  border: 2px solid #fff;
  box-sizing: border-box;
  background-color: #f1f1f1;
  background-position: 50% 25%;
  background-size: cover;
}

#k-nm {
  color: #b8b8b8;
  font-size: 15px;
  font-style: normal;
  margin-left: 8px;
  cursor: pointer;
}

.q-ad-c {
  padding: 2px;
}

.q-ad {
  display: block;
  padding: 8px;
  border: 1px solid #eeeeee;
  background-color: #fafafa;
  border-radius: 4px;
}

.q-ad img {
  display: inline;
  width: 24px;
  height: 24px;
  margin-right: 5px;
  vertical-align: middle;
}

.q-ad span {
  position: relative;
  top: 1px;
  color: #242424;
  font-size: 14px;
  text-align: center;
}

#add_q {
  color: #858585;
  text-align: center;
  margin-top: 10px;
  background-color: #fff;
  border-color: #f1f1f1;
}

#add_q i {
  font-size: 17px;
  margin-right: -3px;
  vertical-align: middle;
}

#add_q span {
  color: #858585;
  font-size: 12.4px;
  position: relative;
  top: -1px;
}

#t-box {
  font-size: 14px;
  color: #686868;
  padding-top: 24px;
  line-height: 18px;
}

#t-box a {
  margin-right: 5px;
}

#t-box a,
#t-more {
  color: #999;
}

#t-more {
  cursor: pointer;
}

#t-more i {
  font-size: 15px;
  vertical-align: middle;
}

#cpy-nt {
  margin-top: 4px;
}

#m-col {
  padding: 0px 55px;
}

.m-mrg {
  margin-bottom: 28px;
  border-radius:10px;
}

#p-tabs {
  position: relative;
  font-size: 13px;
  color: #919191;
  text-align: center;
  padding: 13px 20px;
  margin-top: -64px;
  background-color: #fff;
  box-shadow: 0px 3px 3px #ddd;
  z-index: 3;
}

#p-tabs-m .td {
  width: 16.6666667%;
  cursor: pointer;
}

#p-tabs-m .td.active {
  color: #ee6000;
}

#p-tabs-m span {
  position: relative;
}

#p-tabs-m .td.active span:after {
  content: "";
  position: absolute;
  left: 0px;
  right: 0px;
  bottom: -13px;
  height: 4px;
  background-color: #ee6000;
}

#p-tabs-m .td i {
  display: block;
  font-size: 24px;
  margin-bottom: 5px;
}

#p-tab-m {
  width: 1px;
  color: #ccc;
  cursor: pointer;
}

#p-tab-m i {
  margin-right: -4px;
}

#composer {
  padding: 20px;
  background-color: #fff;
  box-shadow: 0px 3px 3px #ddd;
}

#c-tabs-cvr {
  padding-bottom: 12px;
  border-bottom: 1px solid #ececec;
}

#c-tabs {
  width: auto;
  color: #919191;
}

#c-tabs .td {
  position: relative;
  width: 1px;
  padding: 0px 15px;
  white-space: pre;
  cursor: pointer;
}

#c-tabs .td:after {
  content: "";
  position: absolute;
  top: 50%;
  right: 0px;
  width: 1px;
  height: 12px;
  margin-top: -6px;
  background-color: #eaeaea;
}

#c-tabs .td:first-child {
  padding-left: 0px;
}

#c-tabs .td:last-child {
  padding-right: 0;
}

#c-tabs .td:last-child:after {
  display: none;
}

#c-tabs .td span {
  position: relative;
}

#c-tabs .td.active {
  color: #373737;
}

#c-tabs .td.active span:after {
  content: "";
  position: absolute;
  left: 0px;
  right: 0px;
  bottom: -20px;
  width: 10px;
  height: 10px;
  border: 1px solid transparent;
  border-color: transparent #ececec #ececec transparent;
  margin: 0 auto;
  background-color: #fff;
  transform: rotateZ(45deg);
}

#c-tabs .td i {
  font-size: 21px;
  margin-right: 4px;
  vertical-align: middle;
}

#c-tabs .td span {
  position: relative;
  top: 1px;
  font-size: 15px;
}

#c-c-main {
  position: relative;
  padding-top: 15px;
}

#p-c-i {
  width: 50px;
  border-radius: 50%;
  overflow: hidden;
}

#p-c-i img {
  display: block;
  width: 100%;
}

#c-inp {
  padding-left: 20px;
}

#c-inp input {
  width: 100%;
  font-size: 20px;
  border: 0;
  padding: 0;
  margin: 0;
}

#c-c-main input::placeholder {
  color: #666;
}

#insert_emoji {
  position: absolute;
  right: -2px;
  bottom: -10px;
  cursor: pointer;
}

#insert_emoji i {
  display: block;
  color: #ccced6;
  font-size: 21px;
}

.post {
  padding: 20px;
  background-color: #fff;
  box-shadow: 0px 3px 3px #ddd;
}

.p-p-pic {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  overflow: hidden;
}

.p-p-pic img {
  width: 100%;
  display: block;
  border: 0;
  height: 50px;
}

.p-r-hdr {
  vertical-align: top;
  padding-left: 20px;
}

.p-u-info {
  color: #5a5959;
  font-size: 15px;
  margin-bottom: 7px;
}

.p-u-info a {
  color: #4267b2;
}

.p-dt {
  color: #a8a8a8;
  font-size: 13px;
}

.p-dt i {
  font-size: 14px;
  margin-right: 2px;
}

.p-dt span {
  position: relative;
  top: -2px;
}

.p-opt {
  position: relative;
  right: -3px;
  width: 1px;
  color: #ccc;
  cursor: pointer;
  vertical-align: top;
}

.p-cnt-v {
  display: block;
  margin: 20px -20px;
  cursor: pointer;
}

/* .p-acts {
  overflow: hidden;
} */

.p-act {
  width: 24px;
  height: 24px;
  color: #a3a6aa;
  cursor: pointer;
}

.p-act span {
  position: relative;
  top: 1px;
  width: 20px;
  font-size: 15px;
  color: #a3a6aa;
}

.like {
  margin-right: 220px;
}

.like,
.comment {
  width: 50px;
  float: left;
}

.p-act i {
  vertical-align: middle;
}

.like i,
.comment i {
  margin-right: 6px;
}

.share {
  float: right;
  /* transform: rotateY(180deg); */
  margin-right: 20px;
}


.custom-file-upload {
  display: inline-block;
  background-color: rgba(40, 0, 255, 1);
  color: #fff;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
  text-align: center;
}

.custom-file-upload i {
  margin-right: 10px;
}

.custom-file-upload span {
  font-weight: bold;
}

.custom-file-upload input[type="file"] {
  display: none;
}

#loading {
  text-align: center;
  padding: 40px 0px;
}

#loading i {
  color: #4267b2;
  font-size: 32px;
  display: block;
}
/* Content area finished */

/* Chat bar */
#r-col {
  position: relative;
  width: 150px;
}

#chat-bar {
  position: absolute;
  top: -55px;
  right: 55px;
  bottom: 0px;
  left: 0px;
}

#chat-lb {
  color: #3a5795;
  font-size: 16px;
  text-align: center;
  margin: 23px 0px;
}

#chat-lb i {
  font-size: 18px;
  margin-right: 4px;
  vertical-align: middle;
}

#chat-lb span {
  position: relative;
  top: 2px;
}

.on-ct {
  position: relative;
  width: 50px;
  height: 50px;
  margin: 28px auto 0 auto;
  border-radius: 50%;
}

#cts .on-ct:first-child {
  margin-top: 0px;
}

.on-ct img {
  border-radius: 50%;
}

.on-ct.active:after {
  content: "";
  position: absolute;
  top: 3px;
  right: 2px;
  width: 10px;
  height: 10px;
  background-color: #2ecd18;
  border-radius: 50%;
  box-shadow: 0px 0px 0px 3px #e9ebee;
  z-index: 1;
}

#ct-sett {
  margin-top: 55px;
}

#ct-sett i {
  color: #3a5795;
  padding: 13px;
  background-color: #d8e4ff;
  border-radius: 50%;
  cursor: pointer;
}
/* Chat bar finished */

/* Footer */
#device-bar-2 {
  padding: 9px 0px 13px 0px;
  background-color: #000;
}

#device-bar-2 i {
  display: block;
  width: 40px;
  color: #fff;
  font-size: 40px;
  text-align: center;
  margin: 0 auto;
}
/* Footer finished */


/* Center the modal vertically and horizontally */
#editPostModal {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: white;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      z-index: 1000; /* Ensure the modal appears above the overlay */
    }



    #editintroModal {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: white;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      z-index: 1000; /* Ensure the modal appears above the overlay */
    }


    #overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black */
      z-index: 900; /* Ensure the overlay is behind the modal */
    }




/* Style for the close button */
.close {
  position: absolute;
  top: 20px;
  right: 20px;
  font-size: 20px;
  color: black;
  cursor: pointer;
}


input::placeholder {
  color: #FF5733; /* This is an example color; you can change it to any color you prefer */
}
</style>

</head>

<body style="font-family: tahoma;background-color:#d0d8e4">
<!-- top bar -->


<!-- cover area -->
<div style="width:800px;margin:auto;min-height:400px;">




<!-- Below cover area -->
<div style="display:flex;">
<!-- friends area -->
<div style="min-height:400px;flex:1;">
    <div id="friends_bar">
        <img src="photo/{{session()->get('user')['profile_image']}}" alt="" id="profile_pic">

    <br>
  <a href="profile.php" style="text-decoration:none;margin-right: 40px;">{{session()->get("user")["first_name"]}} {{session()->get("user")["last_name"]}}</a>  

    </div>
</div>
<!-- post area -->
<div
 style="min-height:400px;flex:2.5;padding:20px;padding-right:0px;">

 <!-- form -->
 <div class="m-mrg" id="composer" >
          <div id="c-tabs-cvr">
            <div class="tb" id="c-tabs">
              <div class="td active"><span>Make Post</span></div>
              <div class="td"><span>Photo/Video</span></div>
              <div class="td"><span>Live Video</span></div>
              <div class="td"><span>Life Event</span></div>
            </div>
          </div>
          <div id="c-c-main">
            <div class="tb">
              <div class="td" id="p-c-i"><img src="photo/{{session()->get('user')['profile_image']}}" alt="Profile pic" style="  height: 67px;"></div>
              <div class="td" id="c-inp">

              <!-- inserting -->
              <form action="{{route('posts')}}" method="POST" enctype="multipart/form-data">
 
 @csrf 
              <textarea name="post" placeholder="What's going on your mind" style="width:100%;border-radius: 15px;border: 1px solid gray;"></textarea>
              </div>
            </div>
      
            <label for="file-upload" class="custom-file-upload" style="margin-left: 300px;margin-top: 5px;">
  <i class="fas fa-camera"></i>
  <span>Photos</span>
  <input type="file" id="file-upload" name="file" multiple>
</label>


            <input type="submit" id="post_button" value="Post" style="background-color: rgba(40, 0, 255, 1);color:white;padding:11px;border-radius:5px;float:right;75px;width: 75px;font-weight: bold;margin-top: 5px;">
            </form>
          </div>
        </div>
<!-- form section end -->


<!-- posts -->




<div style="box-shadow:5px 5px 15px blue;border-radius:20px;">


@foreach ($oldPosts as $oldPost)
<?php $row = DB::table("users")
    ->where("email", $oldPost->user_email)
    ->first(); ?>
    <div class="post" style="">
    
    <div class="dropdown">
    @if ($oldPost->user_email ==  session('user.email'))   
  <span style="font-weight: 900;">...</span>

  @endif
  <div class="dropdown-content">

<a href="{{route('delete_post',['id'=>$oldPost->postid])}}"><i class="fa fa-trash-o" aria-hidden="true"></i>  Delete post</a> <br>
<a class="editLink" data-postid="{{$oldPost->postid}}" href=""><i class="fa fa-pencil" aria-hidden="true"></i> Edit post</a>
  

  </div>

</div>


        <div class="tb">
            <a href="#" class="td p-p-pic"><img src="photo/{{$row->profile_image}}" alt="Profile Picture"></a>
            <div class="td p-r-hdr">
                <div class="p-u-info">
                    <a href="#">{{$row->first_name}} {{$row->last_name}}</a>
                    @if($oldPost->is_profile_image)
                        @php
                            $pronoun = ($row->gender == "Female") ? "her" : "his";
                        @endphp
                        <span>updated {{$pronoun}} profile image</span>
                    @endif
                    @if($oldPost->is_cover_image)
                        @php
                            $pronoun = ($row->gender == "Female") ? "her" : "his";
                        @endphp
                        <span>updated {{$pronoun}} cover image</span>
                    @endif
                </div>
                <div class="p-dt">
                    <i class="fa fa-calendar-o" aria-hidden="true"></i>
                    <span>{{ $oldPost->date }}</span>
                </div>
            </div>
            <div class="td p-opt"></div>
        </div>
        <a href="#" class="p-cnt-v">
            <p style="margin-left: 20px; color: black;">{{ $oldPost->post }}</p>
            @if($oldPost->image)
                <img src="photo/{{$oldPost->image}}" alt="" style="width:90%; height:500px; margin-left: 28px;">
            @endif
        </a>
        
        <!-- who liked the post -->
        @php
    $i_liked = false;
    if(session('user[email]'))  {  

    $like = DB::table('likes')
        ->where('type', 'post')
        ->where('contentid', $oldPost['postid'])
        ->select('likes')
        ->first();

    if ($like) {
        $likes = json_decode($like->likes, true);

        $user_ids = array_column($likes, "useremail");

        if (in_array(session('user.email'), $user_ids)) {

          $i_liked = true;
            
        }
    }

  }

@endphp

<a href="{{ route('who_liked', ['type' => 'post', 'id' => $oldPost->postid]) }}">

     @if($oldPost->likes>0)

       @if($oldPost->likes ==1)
        
       @if($i_liked)
        <small style="color:grey;">You liked the post</small>
       @else

       <small style="color:grey;">1 person liked the post</small>
      @endif  



        @else
        @if($i_liked)

       @php
        $text = "others";
        if($oldPost['likes']-1==1){
          $text = "other";
        }
        
        
      @endphp

        <small style="color:grey;">You and {{$oldPost['likes'] - 1}} {{$text}} liked the post</small>
        
        @else
        <small style="color:grey;">{{$oldPost->likes}} people liked the post</small>      
        
        @endif

       @endif 
    @endif    
    </a>
        
        <div>
            <div class="p-acts">
              <a href="{{route('like',['type'=>'post','id'=>$oldPost->postid])}}">
                
                <div class="p-act like">
                 @php
                 $oldPost->likes == "";
                 $likes = ($oldPost->likes>0) ? "(". $oldPost->likes .")" : "";
                 @endphp 
                    <span class="action__like"><i class="fa fa-heart" style="color: red;font-size:15px;"></i> Like{{$likes}}</span>


                </div>
                </a>
                <div class="p-act comment">
                    <span class="action__comment"><i class="fa fa-comment" style="color: grey;font-size:15px;"></i> Comment</span>
                </div>
                <div class="p-act share">
                    <span class="action__share"><i class="fa fa-share" style="font-size:15px;"></i> Share</span>
                </div>
            </div>
        </div>
        <hr style="border-color: grey;margin-top: 75px;
border: 2px solid gray;width: 106%;margin-left: -20px;">
    </div>
@endforeach

</div>






</div>


</div>

</body>

</html>


 <!-- sssss -->
 
          </div>
        </div>




        <div>
        



        
       

        
      </div>
    
  </div>
  

  <br>

  <div id="overlay"></div>
<div id="editPostModal">
  <!-- Close button with Font Awesome 6 syntax -->
 <div class="modal-content">
    <h2>Edit Post</h2>
    <p  id="closeModal"   class="close">X</p>
    <form action="{{ route('updtatepost') }}" method="POST" id="editForm" enctype="multipart/form-data">

      @csrf
  <!-- Add your editing form fields here -->
  <input type="hidden" id="postID" name="postID" value="">
  <input type="text" style="height:100px;width:100%" id="textname" name="text"></br>
  <input type="file" id="fileinput"  name="file" multiple>
<!-- Other form fields... -->
<br>
      <img id="postImage" src="" alt="Post Image" style="height:100px;width:auto;">
      <br>
      <input type="submit" style="color:white;background:blue;padding:5px;" value="Submit"></button>
    </form>
  </div>
</div>
<!-- The modal container end -->
</div>
</div>
<br>


<!-- edit intro  -->





<div id="overlay"></div>

<div id="editintroModal">
  <!-- Close button with Font Awesome 6 syntax -->
 <div class="modal-content">
    
 @if(empty($bio->email))
    <h2>Add Bio</h2>
  
  @else
   
  <h2>Update  Bio</h2>

  @endif
    
  
    <p  id="closeModal1" class="close">x</p>

<form action="{{route('bio')}}" method="POST">
@csrf

<input type="text" name="designation"  placeholder="Designation" style="width: 100%;height: 35px;" value="{{ $bio->designation ?? '' }}">
@if ($errors->has('designation'))
                <small class="text-danger">{{ $errors->first('designation') }}</small><br>
                @endif
<br><br>
<input type="text" name="about"  placeholder="Tell about Youself" style="width: 100%;height: 35px;" value="{{ $bio->about ?? '' }}">
@if ($errors->has('about'))
                <small class="text-danger">{{ $errors->first('about') }}</small><br>
                @endif
<br><br>
<input type="text" name="city" placeholder="city" style="width: 100%;height: 35px;" value="{{ $bio->city ?? '' }}">
@if ($errors->has('city'))
                <small class="text-danger">{{ $errors->first('city') }}</small><br>
                @endif
<br><br>
@if(empty($bio->email))

<input type="submit" value="Save"  name="mode"  style="background-color:rgba(40, 0, 255, 1);padding: 5px;color: white;">

@else

<input type="submit" value="Update" name="mode"  style="background-color:rgba(40, 0, 255, 1);padding: 5px;color: white;">


@endif

</form>
  </div>
</div>

</main>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Your HTML code remains the same -->

<!-- Your HTML code remains the same -->

<script>
$(document).ready(function() {
    $(".editLink").click(function(e) {
        e.preventDefault();

        const postID = $(this).data("postid");
        

        $.ajax({
            url: '/get-post',
            type: 'GET',
            data: { postID: postID },
            success: function(response) {
                const text = response.postContent.post;

                $("#editForm input[id='postID']").val(postID);

                if (text) {
                    $("#editForm input[type='text']").val(response.postContent.post);
                } else {
                    $("#editForm input[type='text']").css("display", "none");
                }

                const imageFilename = response.postContent.image;
                if (imageFilename) {
                    const imageUrl = "photo/" + imageFilename;
                    $("#postImage").attr("src", imageUrl).show();
                } else {
                    $("#postImage").css("display", "none");
                }

                $("#editPostModal").fadeIn();
                $("#overlay").fadeIn();
            }
        });
    });

    // Close the modal
    $("#closeModal").click(function() {
        $("#editPostModal").fadeOut();
        $("#overlay").fadeOut();
    });


    // edit intro


    $(".editintro").click(function(e) {
        e.preventDefault();
        

        $("#editintroModal").fadeIn();
        $("#overlay").fadeIn();
               


        
  

        


      });


      $("#closeModal1").click(function() {
        $("#editintroModal").fadeOut();
        $("#overlay").fadeOut();
    });

     

      
});
</script>

</body>
</html>