import React from 'react';
import ReactDOM from 'react-dom';
import { GalleryBox } from './GalleryBox';
import '../../sass/app.sass';

ReactDOM.render(<GalleryBox url={'/uzivatel/galleries/' + location.pathname.slice(10) } />, document.querySelector('.app'));
