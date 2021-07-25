<template>
  <div>
     <header-component></header-component> 
<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>404</h1>
			</div>
			<h2>Oops! This Page Could Not Be Found</h2>
			<p>Sorry but the page you are looking for does not exist, have been removed. name changed or is temporarily unavailable</p>
			<router-link to="/">Go To Homepage</router-link>
		</div>
	</div>
</div>
</template>

<style>

#notfound {
  position: relative;
  height: 100vh;
  padding:300px 0
}

#notfound .notfound {
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}

.notfound {
  max-width: 767px;
  width: 100%;
  line-height: 1.4;
  padding: 0px 15px;
}

.notfound .notfound-404 {
  position: relative;
  height: 150px;
  line-height: 150px;
  margin-bottom: 25px;
}

.notfound .notfound-404 h1 {
  font-family: 'Titillium Web', sans-serif;
  font-size: 186px;
  font-weight: 900;
  margin: 0px;
  text-transform: uppercase;
  background: url('/assets/img/text.png');
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-size: cover;
  background-position: center;
}
.notfound h2 {
    font-family: 'Titillium Web', sans-serif;
    font-size: 26px;
    font-weight: 700;
    margin: 0;
    padding: 50px 0 20px;
    color: #6f7274;
}
.notfound p {
  font-family: 'Montserrat', sans-serif;
  font-size: 14px;
  font-weight: 500;
  margin-bottom: 0px;
  text-transform: uppercase;
  line-height: 30px;
}
.notfound a {
    font-family: 'Titillium Web', sans-serif;
    display: inline-block;
    text-transform: uppercase;
    color: #fff;
    text-decoration: none;
    border: none;
    background: #32e14a;
    padding: 14px 30px;
    font-size: 14px;
    font-weight: 700;
    margin-top: 20px;
    border-radius: 5px;
}
.notfound a:hover{ background-color: #089ade }
@media only screen and (max-width: 767px) {
  .notfound .notfound-404 {
    height: 110px;
    line-height: 110px;
  }
  .notfound .notfound-404 h1 {
    font-size: 120px;
  }
}
</style>