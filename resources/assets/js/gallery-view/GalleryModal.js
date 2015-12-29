import React from 'react';

export class GalleryModal extends React.Component {

	handleClick = (e) => {
		this.props.onModalHide();
	}
	handleImgClick = (e) => {
		e.stopPropagation();
	}
	nextImage = (e) => {
		e.stopPropagation();
		this.props.changeNextImage(this.props.id);
	}
	prevImage = (e) => {
		e.stopPropagation();
		this.props.changePrevImage(this.props.id);
	}
	render = () => {
		return (
			<div className={this.props.visible} onClick={this.handleClick} >
				<div className="modal-ctn" >
					<span className="glyphicon glyphicon-menu-left arrow-left" 
						  aria-hidden="true"
						  onClick={this.prevImage} >
					</span>
					<img src={this.props.source} className="modal-img" alt="" ref="img" onClick={this.handleImgClick} />
					<button type="button" className="close" ><span>&times;</span></button>
					<span className="glyphicon glyphicon-menu-right arrow-right" 
						  aria-hidden="true"
						  onClick={this.nextImage} >
					</span>	
				</div>
			</div>
		);
	}
}