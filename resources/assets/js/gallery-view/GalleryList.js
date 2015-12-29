import React from 'react';
import ReactCSSTransitionGroup from 'react-addons-css-transition-group';
import { Picture } from './Picture';

export class GalleryList extends React.Component {

	handleDelete = (picture_id) => {
		this.props.onDelete(picture_id);
	}
	handleVisible = (id, src) => {
		this.props.onPictureVisible(id, src);
	}
	render = () => {
		let pictureNodes = this.props.data.map((picture, i) => {
			return (
				<Picture key={i} 
						 onPictureDelete={this.handleDelete} 
						 onPictureVisible={this.handleVisible}
						 gallery_id={picture.gallery_id} 
						 picture_id={picture.id} 
						 url={picture.url} />
			);
		});
		return (
			<div className="row">
			<ReactCSSTransitionGroup transitionName="appear" transitionEnterTimeout={500} transitionLeaveTimeout={300} className="pictures-container">
				{pictureNodes}
			</ReactCSSTransitionGroup>
			</div>
		);
	}
}