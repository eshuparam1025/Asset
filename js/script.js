var sidebarIsOpen = true;

toggleBtn.addEventListener('click', (event) => {
    event.preventDefault();
    
    if(sidebarIsOpen)
    {
        dashboard_sidebar.style.width = '15%';
        dashboard_sidebar.style.transition = '0.3s all';
        dashboard_content_container.style.width = '90%';
        dashboard_logo.style.fontSize = '60px';
        userImage.style.width = '60px';

        menuIcons = document.getElementsByClassName('menuText');
        for(var i=0; i <= menuIcons.length;i++){
            menuIcons[i].style.display = 'none';
        }
        /*------------------------------- Error Below --------------------------------------*/
        // The error is that the dashboard icons are not being center aligned.
        
        document.getElementsByClassName('dashboard_menu_lists')[0].style.textAlign = 'center';
        
        /*------------------------------ Error Above --------------------------------------*/
        sidebarIsOpen = false;
    }
    else{
        dashboard_sidebar.style.width = '25%';
        dashboard_content_container.style.width = '100%';
        dashboard_logo.style.fontSize = '75px';
        userImage.style.width = '80px';

        menuIcons = document.getElementsByClassName('menuText');
        for(var i=0; i <= menuIcons.length;i++){
            menuIcons[i].style.display = 'inline-block';
        }
        

        document.getElementsByClassName('dashboard_menu_lists')[0].style.textAlign = 'left';
        
        
        sidebarIsOpen = true;
    }
});