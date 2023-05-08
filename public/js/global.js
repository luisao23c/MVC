
function script(js){
    let script = document.createElement('script');
    script.type = 'text/javascript';
    script.setAttribute('src', `./public/js/${js}.js`);
    scripts.appendChild(script);
}
function link(cs){
    let link = document.createElement('link');
    link.setAttribute('href', `./public/css/${cs}.css`);
    link.setAttribute('rel', `stylesheet`);
    css.appendChild(link);
    
}