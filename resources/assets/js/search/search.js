import React from 'react';
import ReactDOM from 'react-dom';
import { SearchApp } from './search-app';
import '../../sass/app.sass';

ReactDOM.render(<SearchApp url="/uzivatele/all" />, document.querySelector('.search-app'));