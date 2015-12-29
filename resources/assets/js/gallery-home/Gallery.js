import React from 'react';

export class Gallery extends React.Component {
	
	handleClick = (e) => {
		e.stopPropagation();
		this.props.onGalleryDelete(this.props.id);
		this.refs.btn.blur();
	}
	render = () => {
		if (!this.props.imgUrl) {
			return (
				<div className="gallery">
					<a href={this.props.link}>
					<div className="gallery-content">										
							<h3>{this.props.title}</h3>
							<p>{this.props.description}</p>						
					</div>
					</a>
					<button type="button" 
								onClick={this.handleClick} 
								ref="btn" 
								className="btn btn-default" >
							<span aria-hidden="true">Odstranit</span>
					</button>	
				</div>
			);
		}
		return (
			<div className="gallery">
				<a href={this.props.link}>
				<div className="gallery-content">										
						<h3>{this.props.title}</h3>
						<p>{this.props.description}</p>
					<img src={`/pics/${this.props.id}/${this.props.imgUrl}` } className="img-bg" />
				</div>
				</a>
				<button type="button" 
							onClick={this.handleClick} 
							ref="btn" 
							className="btn btn-default" >
						<span aria-hidden="true">Odstranit</span>
				</button>
			</div>
		);
	}
}
