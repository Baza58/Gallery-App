import React from 'react';
import ReactDOM from 'react-dom';
import { GalleryBox } from './GalleryBox';
import '../../sass/app.sass';

ReactDOM.render(<GalleryBox url='/api/photos' />, document.querySelector('.app'));