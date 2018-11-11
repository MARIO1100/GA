import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Example extends Component {
    constructor(){
        super();
        this.state = {
            accident: [],
            status: [],
        }
    }

    async componentDidMount() {
        setInterval(async () => {
            let $this = this;
            axios.post('api/socket').then(response =>{
                console.log(response.data);

                $this.setState({
                    accident: response.data.message,
                    status: response.data.status
                })
            }).catch(error =>{
                console.log(error);
            });
        }, 60 * 1000);
    }

    componentWillMount(){ // execute first time
        let $this = this;

        axios.post('api/socket').then(response =>{
            console.log(response.data);
            
            $this.setState({
                accident: response.data.message,
                status: response.data.status
            })
            
        }).catch(error =>{
            console.log(error);
        });
    }

    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Example Component</div>
                            <div className={this.state.status == 0 ? 'alert alert-success' : 'alert alert-danger'} role="alert">
                                {this.state.accident}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
