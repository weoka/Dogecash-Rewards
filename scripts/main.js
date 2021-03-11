document.getElementById("slider").oninput = function() {
    var value = (this.value-this.min)/(this.max-this.min)*100
    this.style.background = 'linear-gradient(to right, #A76D4A 0%, #A76D4A ' + value + '%, #D8D8D8 ' + value + '%, #D8D8D8 100%)';
    document.getElementById('percentage').innerHTML=this.value+'%'; 
};
