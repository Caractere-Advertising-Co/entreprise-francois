import "./scss/style.scss";
import "./components/swiper.js";
import "./components/scroll-to-top.js";
import "./components/animate.js";

function component() {
    const element = document.createElement('div');
    // Lodash, currently included via a script, is required for this line to work
    element.innerHTML = 'Hello Word';
  
    return element;
}
  
document.body.appendChild(component());