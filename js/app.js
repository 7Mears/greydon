"use strict";

function start() {
    function lineToAngle(x1, y1, length, radians) {
        var x2 = x1 + length * Math.cos(radians), y2 = y1 + length * Math.sin(radians);
        return {
            x: x2,
            y: y2
        };
    }
    function randomRange(min, max) {
        return min + Math.random() * (max - min);
    }
    function degreesToRads(degrees) {
        return degrees / 180 * Math.PI;
    }
    function createShootingStar() {
        var shootingStar = particle.create(randomRange(width / 2, width), randomRange(0, height / 2), 0, 0);
        shootingStar.setSpeed(randomRange(shootingStarSpeed.min, shootingStarSpeed.max)), 
        shootingStar.setHeading(degreesToRads(starsAngle)), shootingStar.radius = shootingStarRadius, 
        shootingStar.opacity = 0, shootingStar.trailLengthDelta = 0, shootingStar.isSpawning = !0, 
        shootingStar.isDying = !1, shootingStars.push(shootingStar);
    }
    function killShootingStar(shootingStar) {
        setTimeout(function() {
            shootingStar.isDying = !0;
        }, shootingStarLifeTime);
    }
    function update() {
        if (!paused) {
            context.clearRect(0, 0, width, height), context.fillStyle = "rgba(0,0,0,0)", context.fillRect(0, 0, width, height), 
            context.fill();
            for (var i = 0; i < stars.length; i += 1) {
                var star = stars[i];
                star.update(), drawStar(star), star.x > width && (star.x = 0), star.x < 0 && (star.x = width), 
                star.y > height && (star.y = 0), star.y < 0 && (star.y = height);
            }
            for (i = 0; i < shootingStars.length; i += 1) {
                var shootingStar = shootingStars[i];
                shootingStar.isSpawning && (shootingStar.opacity += shootingStarOpacityDelta, shootingStar.opacity >= 1 && (shootingStar.isSpawning = !1, 
                killShootingStar(shootingStar))), shootingStar.isDying && (shootingStar.opacity -= shootingStarOpacityDelta, 
                shootingStar.opacity <= 0 && (shootingStar.isDying = !1, shootingStar.isDead = !0)), 
                shootingStar.trailLengthDelta += trailLengthDelta, shootingStar.update(), shootingStar.opacity > 0 && drawShootingStar(shootingStar);
            }
            for (i = shootingStars.length - 1; i >= 0; i--) shootingStars[i].isDead && shootingStars.splice(i, 1);
        }
        requestAnimationFrame(update);
    }
    function drawStar(star) {
        context.fillStyle = "rgb(100, 100, 255)", context.beginPath(), context.arc(star.x, star.y, star.radius, 0, 2 * Math.PI, !1), 
        context.fill();
    }
    function drawShootingStar(p) {
        var x = p.x, y = p.y, currentTrailLength = maxTrailLength * p.trailLengthDelta, pos = lineToAngle(x, y, -currentTrailLength, p.getHeading());
        context.fillStyle = "rgba(255, 255, 255, " + p.opacity + ")";
        var starLength = 5;
        context.beginPath(), context.moveTo(x - 1, y + 1), context.lineTo(x, y + starLength), 
        context.lineTo(x + 1, y + 1), context.lineTo(x + starLength, y), context.lineTo(x + 1, y - 1), 
        context.lineTo(x, y + 1), context.lineTo(x, y - starLength), context.lineTo(x - 1, y - 1), 
        context.lineTo(x - starLength, y), context.lineTo(x - 1, y + 1), context.lineTo(x - starLength, y), 
        context.closePath(), context.fill(), context.fillStyle = "rgba(100, 100, 255, " + p.opacity + ")", 
        context.beginPath(), context.moveTo(x - 1, y - 1), context.lineTo(pos.x, pos.y), 
        context.lineTo(x + 1, y + 1), context.closePath(), context.fill();
    }
    for (var particle = {
        x: 0,
        y: 0,
        vx: 0,
        vy: 0,
        radius: 0,
        create: function(x, y, speed, direction) {
            var obj = Object.create(this);
            return obj.x = x, obj.y = y, obj.vx = Math.cos(direction) * speed, obj.vy = Math.sin(direction) * speed, 
            obj;
        },
        getSpeed: function() {
            return Math.sqrt(this.vx * this.vx + this.vy * this.vy);
        },
        setSpeed: function(speed) {
            var heading = this.getHeading();
            this.vx = Math.cos(heading) * speed, this.vy = Math.sin(heading) * speed;
        },
        getHeading: function() {
            return Math.atan2(this.vy, this.vx);
        },
        setHeading: function(heading) {
            var speed = this.getSpeed();
            this.vx = Math.cos(heading) * speed, this.vy = Math.sin(heading) * speed;
        },
        update: function() {
            this.x += this.vx, this.y += this.vy;
        }
    }, canvas = document.getElementById("canvas"), context = canvas.getContext("2d"), width = canvas.width = window.innerWidth, height = canvas.height = window.innerHeight, stars = [], shootingStars = [], layers = [ {
        speed: .015,
        scale: .2,
        count: 320
    }, {
        speed: .03,
        scale: .5,
        count: 50
    }, {
        speed: .05,
        scale: .75,
        count: 30
    } ], starsAngle = 145, shootingStarSpeed = {
        min: 15,
        max: 20
    }, shootingStarOpacityDelta = .01, trailLengthDelta = .01, shootingStarEmittingInterval = 2e3, shootingStarLifeTime = 500, maxTrailLength = 300, starBaseRadius = 2, shootingStarRadius = 3, paused = !1, j = 0; j < layers.length; j += 1) for (var layer = layers[j], i = 0; i < layer.count; i += 1) {
        var star = particle.create(randomRange(0, width), randomRange(0, height), 0, 0);
        star.radius = starBaseRadius * layer.scale, star.setSpeed(layer.speed), star.setHeading(degreesToRads(starsAngle)), 
        stars.push(star);
    }
    update(), setInterval(function() {
        paused || createShootingStar();
    }, shootingStarEmittingInterval), window.onfocus = function() {
        paused = !1;
    }, window.onblur = function() {
        paused = !0;
    };
}

!function() {
    function toggleFocus() {
        for (var self = this; -1 === self.className.indexOf("nav-menu"); ) "li" === self.tagName.toLowerCase() && (-1 !== self.className.indexOf("focus") ? self.className = self.className.replace(" focus", "") : self.className += " focus"), 
        self = self.parentElement;
    }
    var container, button, menu, links, subMenus;
    if (container = document.getElementById("site-navigation"), container && (button = container.getElementsByTagName("button")[0], 
    "undefined" != typeof button)) {
        if (menu = container.getElementsByTagName("ul")[0], "undefined" == typeof menu) return void (button.style.display = "none");
        menu.setAttribute("aria-expanded", "false"), -1 === menu.className.indexOf("nav-menu") && (menu.className += " nav-menu"), 
        button.onclick = function() {
            -1 !== container.className.indexOf("toggled") ? (container.className = container.className.replace(" toggled", ""), 
            button.setAttribute("aria-expanded", "false"), menu.setAttribute("aria-expanded", "false")) : (container.className += " toggled", 
            button.setAttribute("aria-expanded", "true"), menu.setAttribute("aria-expanded", "true"));
        }, links = menu.getElementsByTagName("a"), subMenus = menu.getElementsByTagName("ul");
        for (var i = 0, len = subMenus.length; len > i; i++) subMenus[i].parentNode.setAttribute("aria-haspopup", "true");
        for (i = 0, len = links.length; len > i; i++) links[i].addEventListener("focus", toggleFocus, !0), 
        links[i].addEventListener("blur", toggleFocus, !0);
    }
}(), jQuery(document).ready(function($) {
    function Scroller() {
        this.latestKnownScrollY = 0, this.ticking = !1;
    }
    var $content = $(".parallax"), wHeight = $(window).height();
    $(window).on("resize", function() {
        wHeight = $(window).height();
    }), window.requestAnimFrame = function() {
        return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || function(callback) {
            window.setTimeout(callback, 1e3 / 60);
        };
    }(), Scroller.prototype = {
        init: function() {
            window.addEventListener("scroll", this.onScroll.bind(this), !1);
        },
        onScroll: function() {
            this.latestKnownScrollY = window.scrollY, this.requestTick();
        },
        requestTick: function() {
            this.ticking || window.requestAnimFrame(this.update.bind(this)), this.ticking = !0;
        },
        update: function() {
            var currentScrollY = this.latestKnownScrollY;
            this.ticking = !1;
            var slowScroll = currentScrollY / 4;
            $content.css({
                transform: "translateY(-" + slowScroll + "px)",
                "-moz-transform": "translateY(-" + slowScroll + "px)",
                "-webkit-transform": "translateY(-" + slowScroll + "px)"
            });
        }
    };
    var scroller = new Scroller();
    scroller.init();
}), window.onload = function() {
    setTimeout(start, 200);
}, function() {
    var is_webkit = navigator.userAgent.toLowerCase().indexOf("webkit") > -1, is_opera = navigator.userAgent.toLowerCase().indexOf("opera") > -1, is_ie = navigator.userAgent.toLowerCase().indexOf("msie") > -1;
    (is_webkit || is_opera || is_ie) && document.getElementById && window.addEventListener && window.addEventListener("hashchange", function() {
        var element, id = location.hash.substring(1);
        /^[A-z0-9_-]+$/.test(id) && (element = document.getElementById(id), element && (/^(?:a|select|input|button|textarea)$/i.test(element.tagName) || (element.tabIndex = -1), 
        element.focus()));
    }, !1);
}();