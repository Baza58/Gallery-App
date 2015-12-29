import React from 'react';

export class GalleryForm extends React.Component {

	handleSubmit = (e) => {
		e.preventDefault();
		let description = this.refs.description.value;
		let title = this.refs.title.value;
		this.props.onFormSubmit({title, description});
		this.refs.description.value = '';
		this.refs.title.value = '';
	}
	render = () => {
		return (
			<div className="form-container" >
				<h2>Přidat album</h2>
				<form onSubmit={this.handleSubmit} ref="form" >
					<div className="form-group">
						<label htmlFor="title" className="control-label">Název</label>
	        			<input type="text" name="title" ref="title" id="title" className="form-control" required />
		        	</div>
    		    	<div className="form-group">
    		    		<label htmlFor="description" className="control-label">Popis</label>
        				<textarea rows="5" name="description" ref="description" id="description" className="form-control"></textarea>
	        		</div>
	        		<input type="submit" value="Vytvořit" className="btn btn-primary" />
				</form>
			</div>
		);
	}
}