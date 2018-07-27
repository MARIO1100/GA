import React, { Component } from 'react';
import ReactDOM from 'react-dom';

var styleForm = {
    width:'90%',
    marginLeft:'5%',
};
  
export default class ControlPanel extends Component{
    constructor(){
        super();
        this.state = {
            fName: '',
            fCellphone: '',
            sName: '',
            sCellphone: '',
            user_id: 1,
        }
    }

    componentWillMount(){
        axios.get('/api/contact/' + this.state.user_id).then(response => {
            console.log(response.data);
            let data = response.data;
            for(let c of data){
                console.log(c);
                if(c.id == 1){
                    this.setState({
                        fName: c.name,
                        fCellphone: c.cellphone
                    });
                }
                else{
                    this.setState({
                        sName: c.name,
                        sCellphone: c.cellphone
                    });
                }
            }
            console.log(this.state.fName);
            console.log(this.state.sName);
        }).catch(error => {
            console.log(error);
        });
    }

    handleFNameChange(e){
        this.setState({
            fName : e.target.value
        });
    }

    handleFCellphoneChange(e){
        this.setState({
            fCellphone : e.target.value
        });
    }

    handleSNameChange(e){
        this.setState({
            sName : e.target.value
        });
    }

    handleSCellphoneChange(e){
        this.setState({
            sCellphone : e.target.value
        });
    }

    handleSubmit(e){
        e.preventDefault();
        console.log('Submited');

        console.log(this.state);

        axios.post('/api/contact', this.state).then(response =>{
            console.log('response');
            console.log(response.data);
        }).then(error=>{
            console.log(error);
        })

    }

    render(){
        return(
            <div>
                <form style={styleForm} onSubmit={this.handleSubmit.bind(this)}>
                <h1>MC RULES - CONTROLPANEL</h1>
                    <div className="row">
                        <div className="col">
                            <label htmlFor="formGroupExampleInput" >First Contact - Name</label>
                            <input type="text" className="form-control" placeholder="First name" value={this.state.fName} onChange={this.handleFNameChange.bind(this)} />
                        </div>
                        <div className="col">
                            <label htmlFor="formGroupExampleInput" >Cell Phone Number</label>
                            <input type="text" className="form-control" placeholder="Last name"  value={this.state.fCellphone} onChange={this.handleFCellphoneChange.bind(this)} />
                        </div>
                    </div>
                    <div className="row">
                        <div className="col">
                            <label htmlFor="formGroupExampleInput" >Second Contact - Name</label>
                            <input type="text" className="form-control" placeholder="First name" value={this.state.sName} onChange={this.handleSNameChange.bind(this)} />
                        </div>
                        <div className="col">
                            <label htmlFor="formGroupExampleInput" >Cell Phone Number</label>
                            <input type="text" className="form-control" placeholder="Last name" value={this.state.sCellphone} onChange={this.handleSCellphoneChange.bind(this)} />
                        </div>
                    </div>
                    <button type="submit" className="btn btn-primary btn-lg btn-block">Submit!</button>
                </form>
            </div>
        );
    }
}

var controlpanel = document.getElementById('controlpanel');
if(controlpanel){
    ReactDOM.render(<ControlPanel />, controlpanel);
}