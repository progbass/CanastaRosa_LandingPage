import '../../node_modules/@fancyapps/fancybox';

(function(){
	// Extend Image Prototype Functionality
	Image.prototype.resize = function(){
		const container = this.parentNode;
		const containerRatio = container.offsetWidth / container.offsetHeight;
		const imageRatio = this.offsetWidth / this.offsetHeight;
		if(containerRatio > imageRatio){
			this.classList.remove('vertical');
			this.classList.add('horizontal');
		} else {
			this.classList.remove('horizontal');
			this.classList.add('vertical');
		}
	}

	//
	let galleryImages = [].slice.call(document.querySelectorAll('#gallery li'));
	galleryImages.forEach(function(_target){
		const image = _target.querySelector('img');
		image.onload = image.resize;
		image.src = image.src;
	});
    
    
    
    

	//
	window.addEventListener('resize', function(){
		galleryImages.forEach(function(_target){
			const image = _target.querySelector('img');
			image.resize();
		});
	});
}());



// Ajax Object
window.AJAXObject = function(_url, _query, _callback){
    var xmlhttp = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            _callback(xmlhttp.responseText);
        }
        
        //alert(xmlhttp.readyState);
    }

    xmlhttp.open("POST", _url, true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded")
    xmlhttp.send(_query);
}



// REGISTER FORM
window.RegisterForm = (function(){
      
    const register_container = document.querySelector("#registerForm");
    const register_slider = register_container.querySelector(".slider_container");
    const register_form = document.querySelector("#register_form");
    const register_submit = register_form.querySelector('input[type=submit]');
    const register_nav = register_container.querySelector('a.nav');
    const register_fields = [
        register_form.querySelector('input[name=category_sct]'),
        register_form.querySelector('input[name=name_txt]'),
        register_form.querySelector('input[name=email_txt]'),
        register_form.querySelector('input[name=zip_txt]'),
    ];
    
    
    register_nav.addEventListener('click', function(e){
        e.preventDefault();
        this.style.display = 'none';
        register_submit.style.display = 'block';
        register_slider.style.left = (-register_slider.parentNode.offsetWidth)+'px';
    });
    
    const validateForm = function(){
        let query = '?';
        register_fields.forEach(function(_element){
            try{
                query += _element.getAttribute('name')+'='+_element.value+'&';
            } catch(e){}
        });
        
        AJAXObject(register_form.getAttribute('action'), query);
        
        return false;
    }
    
    
    const formSuccess = function(_response){
        alert(_response); // Here is the response
    }
    
    
    return {
        'submit': validateForm
    }
}());




// REGISTER FORM
window.InviteForm = (function(){
      
    const invite_container = document.querySelector("#mailForm");
    const invite_form = document.querySelector("#invite_form");
    const invite_submit = invite_form.querySelector('input[type=submit]');
    const invite_fields = [
        invite_form.querySelector('input[name=name_txt]'),
        invite_form.querySelector('textarea[name=message_txt]')
    ];
    
    
    const validateForm = function(){
        let query = '?';
        invite_fields.forEach(function(_element){
            try{
                query += _element.getAttribute('name')+'='+_element.value+'&';
            } catch(e){}
        });
        alert(query)
        AJAXObject(invite_form.getAttribute('action'), query);
        
        return false;
    }
    
    
    const formSuccess = function(_response){
        alert(_response); // Here is the response
    }
    
    
    return {
        'submit': validateForm
    }
}());
