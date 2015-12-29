import React from 'react';
import { GalleryHeader } from './GalleryHeader';
import { GalleryList } from './GalleryList';
import { GalleryModal } from './GalleryModal';

export class GalleryBox extends React.Component {
	
	state = {
		data: [],
		title: '',
		id: null,
		src: '',
		visible: 'modal',
		user: '',
		description: ''
	}
	componentDidMount = () => {
		$.ajax({
			method: 'GET',
			url: this.props.url,
			success: (data) => {
				this.setState({
					data: data.data,
					title: data.gallery_title,
					userName: data.user,
					description: data.description
				});
			},
		});



		window.addEventListener('popstate', (e) => {
			if (e.state == null || e.state.home == true) {
				this.setState({
					src: '',
					visible: 'modal' 
				});		
				return;
			}
			this.setState({
				id: e.state.id,
				src: e.state.state,
				visible: 'modal visible' 
			});
		});
	}
	
	pictureVisible = (id, src) => {
		this.setState({
			id: id,
			src: src,
			visible: 'modal visible' 
		});
	}
	handleHide = () => {
		var url = `/home/${this.state.userName}/${this.state.data[0].gallery_id}`;
		history.pushState({'home': true}, '', url);
		this.setState({
			src: '',
			visible: 'modal' 
		});
	}
	nextImage = (id) => {
		let instance;
			this.state.data.map((picture, i ) => {
				if (picture.id == id) {
					instance = picture;
				}
			});
			
			let i = this.state.data.indexOf(instance) + 1;
			if (this.state.data[i] != null) {
				var src = `/pics/${this.state.data[i].gallery_id}/${this.state.data[i].url}`
				this.setState({
						id: this.state.data[i].id,
						src: src,
						visible: 'modal visible'
					});	
				let url = `/p/${this.state.data[i].id}`;
				history.pushState({state: src, id: this.state.data[i].id}, '', url);
			}
	}
	prevImage = (id) => {
		let instance;
		
			this.state.data.map((picture, i ) => {
				if (picture.id == id) {
					instance = picture;
				}
			});
			
			let i = this.state.data.indexOf(instance) - 1;
			if (this.state.data[i] != null) {
				var src = `/pics/${this.state.data[i].gallery_id}/${this.state.data[i].url}`
				this.setState({
						id: this.state.data[i].id,
						src: src,
						visible: 'modal visible'
					});	
				let url = `/p/${this.state.data[i].id}`;
				history.pushState({state: src}, '', url);
			}
	}
	render = () => {
		return (
			<div className="app-content">
				<GalleryHeader title={this.state.title} description={this.state.description} />
				<GalleryList data={this.state.data} onPictureVisible={this.pictureVisible} />
				<GalleryModal id={this.state.id} 
							  source={this.state.src} 
							  visible={this.state.visible} 
							  onModalHide={this.handleHide} 
							  changeNextImage={this.nextImage} 
							  changePrevImage={this.prevImage} />
			</div>
		);
	}
}