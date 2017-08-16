const ModalWindow = require('./ModalWindow');



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
    
    let register_page = 0;
    const register_container = document.querySelector("#registerForm");
    const register_sliderContainer = register_container.querySelector(".slider_container");
    const register_slider = register_sliderContainer.querySelector('.slider');
    const register_form = document.querySelector("#register_form");
    const register_submit = register_form.querySelector('input[type=submit]');
    const register_nav = register_container.querySelector('a.nav');
    const register_stepsContainer = register_container.querySelector('.register_step');
    const register_fields = [
        register_form.querySelector('input[name=name_txt]'),
        register_form.querySelector('input[name=email_txt]'),
        register_form.querySelector('input[name=zip_txt]'),
        register_form.querySelector('input[name=phone_txt]')
    ];
    
    const categoriesHolder = register_container.querySelector('.category_list');
    const categories = [].slice.call(register_container.querySelectorAll('input[type=checkbox]'));
    categories.forEach(function(option){
        
        if(option.value != ""){
            const category = document.createElement('li');
            category.innerHTML = option.parentNode.textContent;
            category.setAttribute('data-category', option.value);
            
            category.addEventListener('click', function(){
                this.classList.toggle('active');
                
                
                const selectedCategories = [];
                let catList = [].slice.call(categoriesHolder.querySelectorAll('li'));
                for( let i = 0; i<catList.length; i++){

                    if(catList[i].classList.contains('active')){
                        if(categories[i].value === catList[i].getAttribute('data-category')){
                            categories[i].checked = true;
                            selectedCategories.push(categories[i]);
                        }
                    } else {
                        categories[i].checked = false;
                    }
                };
                
                if(!selectedCategories.length){
                      register_nav.style.visibility = 'hidden';
                } else {
                      register_nav.style.visibility = 'visible';
                }
            });
            
            categoriesHolder.appendChild(category);
        }
    });
    
    
    register_nav.style.visibility = 'hidden';
    register_nav.addEventListener('click', function(e){
        e.preventDefault();
        register_page = 1;
        this.style.display = 'none';
        register_submit.style.display = 'block';
        validateForm();
        moveSlider();
    });
    register_fields.forEach(function(_element){
        _element.addEventListener('blur', function(){
            validateForm()
        });
    });
    
    
    
    const moveSlider = function(){
        // Select Container
        const bullets = register_stepsContainer.querySelectorAll('span');
        bullets.forEach(function(element, index){
            element.classList.toggle('active', false);
            
            if(index == register_page){
                element.classList.toggle('active', true);
            }
        });
        
        
        // Move Slider
        register_slider.style.left = (-register_slider.parentNode.offsetWidth*register_page)+'px';
    }
    
    
    
    const validateForm = function(){
        register_submit.style.visibility = 'hidden';
        let isValid = false;
        
        for(let i = 0; i<register_fields.length; i++){
            let regex;
            switch(register_fields[i].getAttribute('name')){
                case 'name_txt':
                    regex = /^[a-zA-Z ]{2,30}$/;
                     isValid = (regex.test(register_fields[i].value));
                    break;
                case 'email_txt':
                    regex = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
                    isValid = (regex.test(register_fields[i].value));
                    break;
                case 'zip_txt':
                    regex = /^([1-9]{2}|[0-9][1-9]|[1-9][0-9])[0-9]{3}$/;
                    isValid = (regex.test(register_fields[i].value));
                    break;
                case 'phone_txt':
                    //regex = /^([1-9]\d{1}-\d{4}-\d{4}|[1-9]\d{2}-\d{3}-\d{4})$/;
                    //isValid = (regex.test(register_fields[i].value));
                    break;
            }
            
            if(!isValid)
                break;
        };
        
        
        if(isValid){
            register_submit.style.visibility = 'visible';
            return true;
        }
        
        return false;
    }
    
    const submit = function(){
        // Validate Form first
        if(!validateForm()){
            return false;
        }
        
        // Form Query
        let query = '?';
        
        // Input Fields
        register_fields.forEach(function(_element){
            try{
                query += _element.getAttribute('name')+'='+_element.value+'&';
            } catch(e){}
        });
        
        
        // Categories List
        let checkboxes = document.getElementsByName('category_sct[]');
        let vals = "";
        for (let i=0; i<checkboxes.length; i++){
            if (checkboxes[i].checked){
                vals += ","+checkboxes[i].value;
            }
        }
        if (vals) vals = vals.substring(1);
        query += `category_sct=${vals}`;
        
        
        ///
        AJAXObject(register_form.getAttribute('action'), query);
        return false;
    }
    
    
    const formSuccess = function(_response){
        alert(_response); // Here is the response
    }
    
    
    
    
    validateForm();
    return {
        'submit': submit
    }
}());




// REGISTER FORM
window.InviteForm = (function(){
      
    const invite_container = document.querySelector("#mailForm");
    const invite_form = document.querySelector("#invite_form");
    const invite_submit = invite_form.querySelector('input[type=submit]');
    const invite_fields = [
        invite_form.querySelector('input[name=email_txt]'),
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


window.SocialShare = function(_network, _url, _title){
    
    let url = _url, apiEndpoint = "";
    switch(_network){
        case"facebook":
            apiEndpoint = "https://www.facebook.com/sharer/sharer.php?u="+url;
            break;
            
        case"twitter":
            const title = encodeURIComponent(_title);
            apiEndpoint = "https://twitter.com/intent/tweet?text="+title+"&url="+url
    }
    var f=500,g=250,h=screen.width/2-f/2,i=screen.height/2-g/2;    var myWindow = window.open(apiEndpoint,"win_share","width="+f+",height="+g+", top="+i+", left="+h);

}

window.SocialShare2 = function(_network, _url, _title){}



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
    
    
    
    //
    window.registerWindow = new ModalWindow("#registerForm");
    window.shareWindow = new ModalWindow("#mailForm");
}());


