import React, {Component} from 'react';
import ReactDOM from 'react-dom';

export default class Navbar extends Component{
    render(){
        return(
            <nav className="navbar navbar-expand-lg navbar-light bg-light navbar">
                <a className="navbar-brand">Golpe Avisa</a>
                
                <div className="collapse navbar-collapse" id="navbarNav">
                    <ul className="navbar-nav">
                        <li className="nav-item">
                            <a className="nav-link" href="graph">Graphs</a>
                        </li>
                        <li className="nav-item">
                            <a className="nav-link" href="controlpanel">Control Panel</a>
                        </li>
                        <li className="nav-item">
                            <a className="nav-link" href="layout">Maps</a>
                        </li>
                        <li className="nav-item">
                            <a className="nav-link active" href="/">Socket <span className="sr-only">(current)</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        )
    }
} 

var nav = document.getElementById('navbar');
if(nav){
    ReactDOM.render(<Navbar />, nav);
}