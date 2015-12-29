import React from 'react';
import { GalleryList } from './GalleryList';
import { GalleryForm } from './GalleryForm';

export class GalleryBox extends React.Component {
	
	state = {
		data: [],
		userName: ''
	}
	updateData = () => {
		$.ajax({
			method: 'GET',
			url: this.props.url,
			dataType: 'json',
			success: (data) => {
				this.setState({
					data: data.data, 
					userName: data.user
				});
				
			},
			error: (xhr, status, err) => {
       			console.error(this.props.url, status, err.toString());
      		}

		});
	}
	componentDidMount = () => {
		this.updateData();
	}
	handleGallery = (gallery) => {
		let data = this.state.data;
		let newData = data.concat([gallery]);
		this.setState({
			data:  newData
		});

		$.ajax({
			method: 'POST',
			url: 'http://localhost:8000/home/nova-galerie',
			data: gallery,
			success: (data) => {
				this.setState({
					data: data.data 
				});
			}
		});
	}
	handleDeleteGallery = (id) => {
		$.ajax({
			method: 'DELETE',
			url: `/api/photos/${id}/delete`,
			success: (data) => {
				this.setState({
					data: data.data 
				});
			}
		});
	}
	render = () => {
		return (	
			<div >
				<GalleryList onDelete={this.handleDeleteGallery} data={this.state.data} userName={this.state.userName} />
				<hr />
				<GalleryForm onFormSubmit={this.handleGallery} />			
			</div>
		);
	}
}