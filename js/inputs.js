function inputs() {
    var theInputs = document.getElementsByClassName("input");
    
    for (var i = 0; i < theInputs.length; i++) {
        var inputText = theInputs[i].parentNode.innerText;
        
        theInputs[i].placeholder = inputText;
    }
    
    document.getElementById('wp-submit').classList = "";
    
}

document.addEventListener("DOMContentLoaded", function() {
    inputs();
});

