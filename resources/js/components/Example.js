import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import nav from  './navbar'
import 'bootstrap/dist/css/bootstrap.min.css';

export default class Example extends Component {
    render() {
        return (

            <div className="container">

                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Example Component</div>
                            <div className="card-body">I'm an fucjk shite</div>
                        </div>
                    </div>
                </div>
                <nav />
            </div>
        );
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
