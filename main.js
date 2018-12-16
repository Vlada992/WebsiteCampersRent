(function () {
        if (window.location.href.slice(37) == '/vagenDetail.php' || window.location.href.slice(37) == '/vagenDetail.php#' ) {
            //document.getElementsByClassName('nav-link')[2].classList.add('activeClass')
        } else if (window.location.href.slice(37) == '/gallery.php' || window.location.href.slice(37) == '/gallery.php#') {
            document.getElementsByClassName('nav-link')[0].classList.add('activeClass')
        } else if (window.location.href.slice(37) == '/info.php' || window.location.href.slice(37) == '/info.php#' ) {
            document.getElementsByClassName('nav-link')[1].classList.add('activeClass')
            $('.input-daterange').datepicker({})
        }  else if (window.location.href.slice(37) == '/rentDetail.php' || window.location.href.slice(37) == '/rentDetail.php#' ) {
            document.getElementsByClassName('nav-link')[2].classList.add('activeClass')
            $('.input-daterange').datepicker({})
        }  else if (window.location.href.slice(37) == '/preissePage.php' || window.location.href.slice(37) == '/preissePage.php#') {
           /* document.getElementsByClassName('nav-link')[1].classList.add('activeClass')
            document.getElementById('pgPg1').style.borderBottom = '5px solid #0293D1'
            document.getElementById('pgPg1').style.color = '#0293D1'
            document.getElementById('pgPg1').style.backgroundColor = '#d3d3d3'*/
            /*informationen MODAL page modal page modal page */
        }  else if (window.location.href.slice(37) == '/index.html#contFluid') {
            document.getElementsByClassName('nav-link')[0].classList.add('activeClass')
        }  else if (window.location.href.slice(37) == '/contactDetail.php' || window.location.href.slice(37) == '/contactDetail.php#') {
            document.getElementsByClassName('nav-link')[3].classList.add('activeClass')
        }

    /******* */
    var btn = $('#button2'), btn1 = $('#button3')
    var galBtn = $('#galleryBtn'), galBtn1 = $('#btnGalr')
    /* button for scrolling on DOM on index.html */
    $(window).scroll(function () {
        if ($(window).scrollTop() > 400) {
            btn.addClass('show');
        } else if($(window).scrollTop() > 200  ){
            btn1.addClass('show1');
        }  else {
           btn.removeClass('show');
           btn1.removeClass('show1');
        };
    });
    //button to up
    btn.on('click', function (e) {
        e.preventDefault();        
        $('html, body').animate({
            scrollTop: 0
        }, 'slow');
    });
    //button to up
    //button to down
    btn1.on('click', function (e) {
        e.preventDefault();
        /*$('html, body').animate({
            scrollTop: 660
        }, '300');*/
        $('html, body').animate({scrollTop:$('#scroll1').position().top}, 'slow');
    });
    //button to down
    galBtn.on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({scrollTop:$('#scrollerId').position().top}, 'slow');
    });



    galBtn1.on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 2280
        }, 'smooth');
    });
    /***** */


    let checkBoxInpt1 = document.getElementsByClassName('checkbox')
    let arrTo = Array.prototype.slice.call(checkBoxInpt1)
    arrTo.map(function (each) {
        let switcheR = false;
        each.addEventListener('click', function (obj) {
            let objId = 'lbl' + obj.target.id.slice(3)
            if (objId == null) {
                return false;
            }
            let domLabel = document.getElementById(objId)
            if (!switcheR) {
                domLabel.style.fontWeight = '800'
                switcheR = true;
            } else {
                domLabel.style.fontWeight = '600'
                switcheR = false;
            }
        })
    });

    $("#content1").css('visibility', 'visible').hide().show("slide", {
        direction: "left"
    }, 900);
    $(".ausstMove").css('visibility', 'visible').hide().show("slide", {
        direction: "left"
    }, 900);
    $("#content2").css('visibility', 'visible').hide().show("slide", {
        direction: "up"
    }, 900);
    $(".galMove").css('visibility', 'visible').hide().show("slide", {
        direction: "down"
    }, 900);
    $("#content3").css('visibility', 'visible').hide().show("slide", {
        direction: "right"
    }, 900);
    $(".kontMove").css('visibility', 'visible').hide().show("slide", {
        direction: "right"
    }, 900);
})() //  >>>>----------  imidiet invoked function expression (IIFE)  --------<<<<


function showHideF(e) {
    if (e.target.innerText == 'Alkoven') {
        document.getElementById('pageAlkoven').style.display = 'block'
        document.getElementById('pageVolin').style.display = 'none'
        document.getElementById('pageKasten').style.display = 'none'
        document.getElementById('pageTelient').style.display = 'none'
        document.getElementById('pageWohnwagen').style.display = 'none'
        document.getElementById('pgPg22').style.borderBottom = '5px solid #0293D1'
        document.getElementById('pgPg22').style.color = '#0293D1'
        document.getElementById('pgPg22').style.backgroundColor = '#d3d3d3'

    } else if (e.target.innerText == 'Vollintegriert') {
        document.getElementById('pageAlkoven').style.display = 'none'
        document.getElementById('pageTelient').style.display = 'none'
        document.getElementById('pageKasten').style.display = 'none'
        document.getElementById('pageWohnwagen').style.display = 'none'
        document.getElementById('pageVolin').style.display = 'block'
        document.getElementById('pgPg1').style.borderBottom = '5px solid #0293D1'
        document.getElementById('pgPg1').style.color = '#0293D1'
        document.getElementById('pgPg1').style.backgroundColor = '#d3d3d3'
    } else if (e.target.innerText == 'Teilintegrierte') {
        document.getElementById('pageAlkoven').style.display = 'none'
        document.getElementById('pageVolin').style.display = 'none'
        document.getElementById('pageKasten').style.display = 'none'
        document.getElementById('pageWohnwagen').style.display = 'none'
        document.getElementById('pageTelient').style.display = 'block'
        document.getElementById('pgPg33').style.borderBottom = '5px solid #0293D1'
        document.getElementById('pgPg33').style.color = '#0293D1'
        document.getElementById('pgPg33').style.backgroundColor = '#d3d3d3'
    } else if (e.target.innerText == 'Kastenwagen') {
        document.getElementById('pageAlkoven').style.display = 'none'
        document.getElementById('pageVolin').style.display = 'none'
        document.getElementById('pageTelient').style.display = 'none'
        document.getElementById('pageWohnwagen').style.display = 'none'
        document.getElementById('pageKasten').style.display = 'block'
        document.getElementById('pgPg44').style.borderBottom = '5px solid #0293D1'
        document.getElementById('pgPg44').style.color = '#0293D1'
        document.getElementById('pgPg44').style.backgroundColor = '#d3d3d3'
    } else if (e.target.innerText == 'Wohnwagen') {
        document.getElementById('pageAlkoven').style.display = 'none'
        document.getElementById('pageVolin').style.display = 'none'
        document.getElementById('pageTelient').style.display = 'none'
        document.getElementById('pageKasten').style.display = 'none'
        document.getElementById('pageWohnwagen').style.display = 'block'
        document.getElementById('pgPg55').style.borderBottom = '5px solid #0293D1'
        document.getElementById('pgPg55').style.color = '#0293D1'
        document.getElementById('pgPg55').style.backgroundColor = '#d3d3d3'
    }
}; //-------- showHideF function -------------


/*logo huver*/
let idId = document.getElementById('indId1')
idId.addEventListener('mouseover', function () {
    document.getElementById('stajlLogo1').style.display = 'inline-block';
    document.getElementById('stajlLogo').style.display = 'none'
});
idId.addEventListener('mouseout', function () {
    document.getElementById('stajlLogo').style.display = 'inline-block';
    document.getElementById('stajlLogo1').style.display = 'none'
});
/*logo huver*/

/*btn contact/rent in fahrzeug all*/
if(document.getElementById('mietenAFahr') ){
let aEnvelope = document.getElementById('mietenAFahr'), aEye = document.getElementById('detailAFahr');
aEnvelope.addEventListener('mouseover', function () {
    document.getElementById('envelId1Fahr').style.display = 'inline-block';
    document.getElementById('envelId2Fahr').style.display = 'none'
});
aEnvelope.addEventListener('mouseout', function () {
    document.getElementById('envelId1Fahr').style.display = 'none';
    document.getElementById('envelId2Fahr').style.display = 'inline-block'
});
aEye.addEventListener('mouseover', function () {
    document.getElementById('eyeId1Fahr').style.display = 'inline-block';
    document.getElementById('eyeId2Fahr').style.display = 'none'
});
aEye.addEventListener('mouseout', function () {
    document.getElementById('eyeId1Fahr').style.display = 'none';
    document.getElementById('eyeId2Fahr').style.display = 'inline-block'
});
};
/*btn contact/rent in fahrzeug all*/


/*form-control on change*/ 
const cbox = document.querySelectorAll(".form-control");
console.log(cbox)
 for (let i = 0; i < cbox.length; i++) {
     console.log(cbox[i].value)
     cbox[i].addEventListener("change", function() {
       cbox[i].style.borderBottom = '2px solid #0293D1';
       cbox[i].style.opacity = '1';
     });

 }

 for (let i = 0; i < cbox.length; i++) {
    console.log(cbox[i].value)
    cbox[i].addEventListener("keyup", function() {
      cbox[i].style.borderBottom = '0px solid #0293D1';
      cbox[i].style.opacity = '0.5';
    });

}


var takeMFP = document.getElementsByClassName('mfp-arrow')
console.log(takeMFP)
 

/*form-control on change*/ 
