import React from 'react';

export class Picture extends React.Component {
	
	handleVisible = (e) => {
		e.preventDefault();
		var id = this.props.picture_id;
		var src = `/pics/${this.props.gallery_id}/${this.props.url}`;
		var url = `/p/${this.props.picture_id}`;
		history.pushState({state: src}, '', url);

		this.props.onPictureVisible(id, src);
	}
	render = () => {
		return (
			<div className="picture">
				<a href="#" className="thumbnail" id={this.props.id} onClick={this.handleVisible} >
					<img src={`/pics/${this.props.gallery_id}/${this.props.url}`} alt="" />			
				</a>
			</div>
		);
	}
}