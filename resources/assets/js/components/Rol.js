import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Rol extends Component {
    
    constructor(){
        
        super();
        //Initialize the state in the constructor
        this.state= {
            rols: [],
        }
    }

    /*componentDidMount() is a lifecycle method
    * that gets called after the component is rendered
    */
    componentDidMount() {
        /* fetch API in action */
        fetch('/api/rol')
        .then(response => {
            return response.json();
        })
        .then(rols => {
            //Fetched product is stored in the state
            this.setState({ rols });
        });
    }

    renderProducts() {
        return this.state.products.map(rol => {
            return (
                /* When using list you need to specify a key
                 * attribute that is unique for each list item
                */
                <li key={rol.id} >
                    { rol.title } 
                </li>      
            );
        })
      }

    render() {
        return (
            <div>
              <ul>
                { this.renderProducts() }
              </ul> 
            </div>
        );
    }
}

if (document.getElementById('rol')) {
    ReactDOM.render(<Rol />, document.getElementById('rol'));
}
