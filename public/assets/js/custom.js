 $('.main-slider').slick({
  slidesToShow: 1,
  dots:true,
  arrows: false,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 4000,
  speed: 2000,
});


$('.testimonial').slick({
  slidesToShow: 2,
  slidesToScroll: 1,
  speed: 2000,
  autoplay: true,
  adaptiveHeight: true,
  autoplaySpeed: 2000,
});

// Client Slider
$('.client').slick({
  slidesToShow: 2,
  infinite: true,
  dots:true,
  arrows: false,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 4510,
   responsive: [{
      breakpoint: 639,
      settings: {
        slidesToShow: 2,
      }}]
});
// End



function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}


// Scroll to Get Started Section
$('.main-nav a.started').on("click", function(){
  $('html, body').animate({
  scrollTop: $('#get-started').offset().top
   }, 1500);
});
//End



// Return To top
$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {
        $('#return-to-top').fadeIn(200);
    } else {
        $('#return-to-top').fadeOut(200);
}
});
$('#return-to-top').click(function() {
    $('body,html').animate({
        scrollTop : 0
    }, 500);
});

// End



$(document).ready(function(){

// Mobile Menu

  $('a#hamburg').on('click',function(e){
        $('html').toggleClass('open-menu');
        return false;
    });
    $('div#hamburg').on('click',function(){
        $('html').removeClass('open-menu');
    });
// End


$('a[href^="#"]').on('click', function (e) {
    e.preventDefault();

    var target = this.hash;
    var $target = $(target);

    $('html, body').animate({
        'scrollTop': $target.offset().top
    }, 1000, 'swing');
});


// table three Dots Dropdown

$('.dropbtn').on('click',function(){
  // $('.dropdown-content').toggleClass('show');
  $(this).parent().find('.dropdown-content').toggleClass('show').siblings().removeClass('show');
});


class SikDropdown {
    ele = null;
    dropdown = null;
    el = {
        input: null,
        toggle: null,
        list: null
    };

    items = {};
    count = 0;
    _cbs = [];
    defaults = {
        name: "sik-input",
        value: "",
        placeholder: "Select Item"
    };
    options = {};
    constructor(identifier, opt = {}) {
        this.ele = document.querySelector(identifier);
        if (this.ele) {
            //Set options:
            this.setOptions(opt);
            //Create hidden input:
            this.el.input = document.createElement("input");
            this.el.input.setAttribute("type", "hidden");
            this.el.input.setAttribute("name", this.options.name);
            this.el.input.setAttribute("id", this.options.id);
            this.el.input.setAttribute("value", "");
            this.ele.prepend(this.el.input);

            //Select list:
            this.el.list = this.ele.querySelector(".dropdown-menu");
            this._fillItems();
            //Set toggler:
            this.el.toggle = this.ele.querySelector(".dropdown-toggle");
            this.dropdown = new bootstrap.Dropdown(this.el.toggle);
            //Set initial value & placeholder:
            this.setValue(this.options.value);
            //Set core handlers:
            this._attachCoreHandlers();
            this.trigger("init");
        } else {
            console.warn("Cant create a Sik Dropdown - selector is invalid");
        }
    }
    setOptions(opt) {
        this._extend(this.options, this.defaults, opt);
    }
    addItem(value, label) {
        if (!this.items.hasOwnProperty(value)) {
            let itemContainer = document.createElement("li");
            itemContainer.innerHTML = `<span class="dropdown-item" data-value="${value}">${label}</span>`;
            this.el.list.appendChild(itemContainer);
            let item = itemContainer.querySelector(".dropdown-item");
            this.count++;
            this.items[value] = {
                el: item,
                value: value,
                label: item.innerHTML.trim()
            };
            item.addEventListener("click", this.trigger.bind(this, "select"));
        }
    }
    removeItem(value) {
        if (this.items.hasOwnProperty(value)) {
            this.items[value].el.closest("li").remove();
            this.count--;
            delete this.items[value];
            if (this.value() === value) {
                this.setValue(null);
            }
        }
    }
    setValue(value, close = true) {
        if (this.items.hasOwnProperty(value)) {
            this.el.input.setAttribute("value", value);
            this.el.toggle.innerHTML = this.items[value].label;
        } else {
            this.el.input.setAttribute("value", "");
            if (this.options.placeholder) {
                this.el.toggle.innerHTML = this.options.placeholder;
            }
        }
        if (close) this.dropdown.hide();
    }
    value() {
        return this.el.input ? this.el.input.value : null;
    }
    text() {
        let value = this.value();
        if (this.items.hasOwnProperty(value)) {
            return this.items[value].label.trim();
        }
        return "";
    }
    open() {
        if (this.dropdown) {
            this.dropdown.show();
        }
    }
    close() {
        if (this.dropdown) {
            this.dropdown.hide();
        }
    }
    toggle() {
        if (this.dropdown) {
            this.dropdown.toggle();
        }
    }
    attachHandler(ev, cb) {
        this._cbs.push({
            ev: ev,
            fn: cb
        });
    }
    detachHandler(ev) {
        for (let i = 0; i < this._cbs.length; i++) {
            if (this._cbs[i].ev === ev) {
                this._cbs.splice(i, 1);
            }
        }
    }
    trigger(ev) {
        //console.log(this, ev, el);
        for (let cb of this._cbs) {
            let event = cb.ev.split(".");
            if (event.length > 1 && event[1] === ev) {
                let [, ...args] = arguments;
                cb.fn.call(this, ...args);
            }
        }
    }
    _fillItems() {
        if (this.el.list) {
            let items = this.el.list.querySelectorAll(".dropdown-item");
            let i = items.length;
            this.count = items.length;
            while (i--) {
                const value = items[i].getAttribute("data-value");
                this.items[value] = {
                    el: items[i],
                    value: value,
                    label: items[i].innerHTML.trim()
                };
                items[i].addEventListener(
                    "click",
                    this.trigger.bind(this, "select")
                );
            }
        }
        console.log(this.items);
    }
    _attachCoreHandlers() {
        this.attachHandler("core.select", function (item = null) {
            if (typeof item === "object" && "target" in item) {
                let selected = item.target.hasAttribute("data-value")
                    ? item.target
                    : item.target.closest("[data-value]");
                let value = selected
                    ? selected.getAttribute("data-value")
                    : null;
                this.setValue(value);
            }
        });
        this.attachHandler("core.open", function () {
            console.log("open", arguments);
        });
        this.attachHandler("core.close", function () {
            console.log("close", arguments);
        });
        this.attachHandler("core.init", function () {});
        //Bind to dropdown:
        this.el.toggle.addEventListener(
            "show.bs.dropdown",
            this.trigger.bind(this, "open")
        );
        this.el.toggle.addEventListener(
            "hide.bs.dropdown",
            this.trigger.bind(this, "close")
        );
    }
    _extend() {
        for (var i = 1; i < arguments.length; i++)
            for (var key in arguments[i])
                if (arguments[i].hasOwnProperty(key))
                    arguments[0][key] = arguments[i][key];
        return arguments[0];
    }
}

//This how we intiate it and extend the bs funcionality:
var dropdown = new SikDropdown("#sik-select", {
    name: "select-example", // the input field name
    placeholder: "Bulk",
    id: "assignment_id",
    value: null
});

//adding a callback just for demo:
dropdown.attachHandler("myhandler.select", function () {
    console.log("select", this);
    let tag = document.getElementById("selected-example");
    tag.innerText = this.value();
});



// table three Dots Dropdown End

});


// Add And Remove Item

$(document).ready(function() {
  // $(".delete").hide();
  $(".addmore").click(function(e) {
    // $(".delete").fadeIn("1500");
    $(".vendor_invite .outbox .addemailmore").append('<label class="form-group">Email Address <input type="email" name="email[]" class="form-controll" placeholder="Enter email"> </label>');
  });
  $("body").on("click", ".delete", function(e) {
    $(".vendor_invite .outbox form label.form-group").last().remove();
  });
});

// Add And Remove Item

// --------------------------------------------------Tabs------------------------------------------------------------------------//
$(document).ready(function() {
    $(".tabs-menu a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".tab-content").not(tab).css("display", "none");
        $(tab).fadeIn();
    });

    $(".tabs-menu2 a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".tab-content2").not(tab).css("display", "none");
        $(tab).fadeIn();
    });

    $('.header .userdata li a.setting').on('click', function(){
      $('.vendor_pop').addClass('openpop');
    });

    $('.popup .overlay .close').on('click', function(){
      $('.vendor_pop').removeClass('openpop');
    });

    $('.addclint_pop').on('click', function(){
      $('.client_assign_pop').addClass('openpop');
    });

    $('.client_assign_pop .overlay .close').on('click', function(){
      $('.client_assign_pop').removeClass('openpop');
    });

    $('.searchclient_folder').on('click', function(){
      $('.client_folder_pop').addClass('openpop');
    });

    $('.client_folder_pop .overlay .close').on('click', function(){
      $('.client_folder_pop').removeClass('openpop');
    });


    $('.searchjob_folder').on('click', function(){
      $('.job_assign_pop').addClass('openpop');
    });

    $('.job_assign_pop .overlay .close').on('click', function(){
      $('.job_assign_pop').removeClass('openpop');
    });


    $('.addjob_pop').on('click', function(){
      $('.job_folder_pop').addClass('openpop');
    });

    $('.job_folder_pop .overlay .close').on('click', function(){
      $('.job_folder_pop').removeClass('openpop');
    });



// File Upload Form

function hiddenFile(o) {
  let file = "";
  file += '<input type="file" name="file" id="' + o.id + '"/>';
  return file;
}

function file(o) {
  let type = "";
  if (o.ext === "pptx" || o.ext === "ppt") {
    type = "powerpoint";
  } else if (o.ext === "png" || o.ext === "jpg") {
    type = "image";
  } else if (o.ext === "xlsx") {
    type = "excel";
  } else if (o.ext === "pdf") {
    type = "pdf";
  } else {
    type = "alt";
  }

  let fileThumbnail = "";
  fileThumbnail += '<div class="thumbnail">';
  fileThumbnail += '  <i class="far fa-file-' + type + '"></i>';
  fileThumbnail += '  <p class="name">' + o.name + "</p>";
  fileThumbnail +=
    '  <a href="#' +
    o.id +
    '" class="delete"><i class="far fa-minus-square"></i></a>';
  fileThumbnail += "</div>";
  return fileThumbnail;
}

function addFile(o) {
  $(".file-hidden-list").append(hiddenFile(o));
  $("#" + o.id).click();
  $("#" + o.id).on("change", function (e) {
    const arr1 = e.target.value.split("\\");
    const name = arr1[arr1.length - 1];
    o.name = name;

    const arr2 = e.target.value.split(".");
    const ext = arr2[arr2.length - 1];
    o.ext = ext;

    $(".file-list").append(file(o));
  });
}

function makeid(length) {
  var result = "";
  var characters =
    "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
  var charactersLength = characters.length;
  for (var i = 0; i < length; i++) {
    result += characters.charAt(Math.floor(Math.random() * charactersLength));
  }
  return result;
}


$(document).on("click", "#addFile", function () {
  addFile({ id: makeid(10) });
});
$(document).on("click", ".delete", function () {
  const id = $(this).attr("href");
  $(id).remove();
  $(this).parent().remove();
});


// Rich Text Editor

$("#summernote").summernote({
  placeholder: "Hello stand alone ui",
  tabsize: 2,
  height: 100,
  toolbar: [
    ["style", ["style"]],
    ["font", ["bold", "underline", "clear"]],
    ["color", ["color"]],
    ["para", ["ul", "ol", "paragraph"]],
    ["table", ["table"]],
    ["insert", ["link", "picture", "video"]],
    ["view", ["fullscreen", "codeview", "help"]]
  ]
});

// Rich Text Editor End


// graph Chart

const { Chart } = SingleDivUI;

const options = {
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
    series: {
      points: [15, 9, 25, 18, 31, 25]
    }
  },
  height: 200,
  width: 400
};



new Chart("#chart3", {
  type: "area",
  ...options
});


// Donut Graph Chart

var width = 100,
  height = 100;

var outerRadius = width / 2;
var innerRadius = 30;

var data = [78];
var pie = d3.layout.pie().value(function (d) {
  return d;
});

var endAng = function (d) {
  return (d / 100) * Math.PI * 2;
};

var bgArc = d3.svg
  .arc()
  .innerRadius(innerRadius)
  .outerRadius(outerRadius)
  .startAngle(0)
  .endAngle(Math.PI * 2);

var dataArc = d3.svg
  .arc()
  .innerRadius(innerRadius)
  .outerRadius(outerRadius)
  .cornerRadius(15)
  .startAngle(0);

var svg = d3
  .select(".chart-area")
  .append("svg")
  .attr("preserveAspectRatio", "xMinYMin meet")
  .attr("viewBox", "0 0 100 100")
  .attr("class", "shadow")
  .classed("svg-content", true);

var path = svg
  .selectAll("g")
  .data(pie(data))
  .enter()
  .append("g")
  .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");

path
  .append("path")
  .attr("d", bgArc)
  .style("stroke-width", 5)
  .attr("fill", "rgba(0,0,0,0.2)");

path
  .append("path")
  .attr("fill", "#fa7000")
  .transition()
  .ease("ease-in-out")
  .duration(750)
  .attrTween("d", arcTween);

path
  .append("text")
  .attr("fill", "#fff")
  .attr("font-size", "1.3em")
  .attr("tex-anchor", "middle")
  .attr("x", -13)
  .attr("y", 8)
  .transition()
  .ease("ease-in-out")
  .duration(750)
  .attr("fill", "#000")
  .text(data);

path
  .append("text")
  .attr("fill", "#fff")
  .attr("class", "ratingtext")
  .attr("font-size", "0.6em")
  .attr("tex-anchor", "middle")
  .attr("x", 10)
  .attr("y", 8)
  .text("%")
  .transition()
  .ease("ease-in-out")
  .duration(750)
  .attr("fill", "#000");

function arcTween(d) {
  var interpolate = d3.interpolate(d.startAngle, endAng(d.data));
  return function (t) {
    d.endAngle = interpolate(t);
    return dataArc(d);
  };
}


});
