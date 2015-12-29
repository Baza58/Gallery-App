import React from 'react';
import ReactDOM from 'react-dom';
import { GalleryBox } from './GalleryBox';
import '../../sass/app.sass';

ReactDOM.render(<GalleryBox url={'/api/photos/' + location.pathname.match(/\/([0-9]+)/)[1]} />, document.querySelector('.app'));