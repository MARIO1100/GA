import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Graph extends Component{
    render(){
        return(
            <div>
                <h1>MC RULES - GRAPHS</h1>
            </div>
        );
    }
}

var graph = document.getElementById('graph');
if(graph){
    ReactDOM.render(<Graph />, graph);
}