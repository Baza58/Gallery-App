import React from 'react';
import ReactCSSTransitionGroup from 'react-addons-css-transition-group';
import { Gallery } from "./gallery.js";

export class GalleryList extends React.Component {
	
	handleDelete = (id) => {
		this.props.onDelete(id);
	}
	render = () => {
		var galleryNodes = this.props.data.map((gallery, i) => {		
			if (!gallery.pictures || !gallery.pictures.length) {
				return (
					<Gallery key={i} 
							 link={`/home/${this.props.userName}/${gallery.id}`} 
							 onGalleryDelete={this.handleDelete}
							 title={gallery.title} 
							 description={gallery.description}  
							 id={gallery.id} />
				);
			}
			return (
					<Gallery key={i} 
							 link={`/home/${this.props.userName}/${gallery.id}`} 
							 onGalleryDelete={this.handleDelete}
							 title={gallery.title} 
							 description={gallery.description}  
							 id={gallery.id} 
							 imgUrl={gallery.pictures[0].url} />
				);
		});
		return (

			<ReactCSSTransitionGroup transitionName="appear" transitionEnterTimeout={500} transitionLeaveTimeout={300} className="gallery-container">
				{galleryNodes}
			</ReactCSSTransitionGroup>

		);
	}
}