
// MODAL FORM 
var ModalWindow = function(_target){
    let closeTimer = 0;
    const modal_fragment = document.createDocumentFragment();
    const modal_container = document.createElement('div');
    
    const background = document.createElement('div');
    background.className = 'background';
    
    let targetContent = document.querySelector(_target);
    targetContent.classList.add('modalContent');
    let content = targetContent.parentNode.removeChild(targetContent);
    
    modal_fragment.appendChild(background);
    modal_fragment.appendChild( content );
    modal_container.appendChild( modal_fragment );
    modal_container.classList.add('modalWindow');
    
    
    modal_container.addEventListener('click', function(e){
        e.stopPropagation();
        if(e.target.className === 'background'){
            closeWindow();
        }
    });
    
    
    const closeWindow = function(){
        modal_container.classList.remove('active');
        console.log(modal_container.classList);
        
        clearInterval(closeTimer);
        closeTimer = setTimeout(function(){
            document.body.removeChild(modal_container);
        }, 2000);
        
        document.querySelector('#main_container').style.position = 'relative';
    }
    const openWindow = function(){
        clearInterval(closeTimer);
        
        modal_container.classList.add('active');
        document.querySelector('#main_container').style.position = 'fixed';
        document.body.appendChild(modal_container);
    }
    
    return{
        openWindow,
        closeWindow
    }
};

module.exports = ModalWindow;