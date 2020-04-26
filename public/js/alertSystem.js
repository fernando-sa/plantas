function addErrorAlert(text, time = 4000){
    const errorDisplay = document.getElementById('alertsErrorsDisplay');
    const errorList = document.getElementById('alertsErrorsList');
    
    let error = document.createElement('li');
    error.textContent = text;
    errorList.appendChild(error);

    errorDisplay.style.display = 'block';

    setTimeout(function(){
        error.remove();
        
        if (errorList.childElementCount == 0) {
            errorDisplay.style.display = 'none';
        }
    }, time);
}