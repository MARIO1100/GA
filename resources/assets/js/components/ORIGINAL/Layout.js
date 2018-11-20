import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Layout extends Component{
    render(){
        return(
            <div>
                <h1>Incident points</h1>
            </div>
        );
    }
}

var layout = document.getElementById('layout');
if(layout){
    ReactDOM.render(<Layout />, layout);
}