import React from 'react';

export class Gallery extends React.Component {
	render = () => {
		let src = `/pics/${this.props.id}/${this.props.imgUrl}`;

		if (!this.props.imgUrl) {
			return (
				<div className="gallery">
					<a href={this.props.link}>
					<div className="gallery-content">										
							<h3>{this.props.title}</h3>
							<p>{this.props.description}</p>						
					</div>
					</a>	
				</div>
			);
		}
		return (
			<div className="gallery">
				<a href={this.props.link}>
				<div className="gallery-content">										
						<h3>{this.props.title}</h3>
						<p>{this.props.description}</p>
					<img src={src} className="img-bg" />
				</div>
				</a>
			</div>
		);
	}
}