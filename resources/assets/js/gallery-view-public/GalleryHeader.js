import React from 'react';

export class GalleryHeader extends React.Component {
	render = () => {
		return (
			<div>
				<h1 className="gallery-header">{this.props.title}</h1>	
				<p className="gallery-desc">{this.props.description}</p>				
			</div>
		);
	}
}