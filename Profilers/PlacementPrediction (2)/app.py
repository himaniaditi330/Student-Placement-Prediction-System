import flask
import pickle
import pandas as pd
from flask_mysqldb import MySQL
# Use pickle to load in the pre-trained model
with open(f'model/Placement.pkl', 'rb') as f:
    model = pickle.load(f)

# Initialise the Flask app
app = flask.Flask(__name__, template_folder='templates')

app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'kite'

mysql = MySQL(app)


# Set up the main route
@app.route('/', methods=['GET', 'POST'])
def main():
	if flask.request.method == 'GET':
        # Just render the initial form, to get input
		return(flask.render_template('main.html'))
		
	if flask.request.method == 'POST':
		cur = mysql.connection.cursor()
		ID = int(flask.request.form['ID'])
		cur.execute(f"select * from marks where ID = {ID}")
		fetchdata = cur.fetchall()
		Quants=fetchdata[0][1]
		Reasoning=fetchdata[0][2]
		English=fetchdata[0][3]
		PI=fetchdata[0][4]
		GD=fetchdata[0][5]
		Programming=fetchdata[0][6]
		 # Make DataFrame for model
		input_variables = pd.DataFrame([[Quants, Reasoning, English, PI, GD, Programming]],
										columns=['Quants', 'Reasoning', 'English', 'PI', 'GD', 'Programming'],
									dtype=float,
									index=['input'])

        # Get the model's prediction
		res=''
		prediction = model.predict(input_variables)[0]
		s=abs(100-(prediction*100))
		s=100-s
		cur.execute(f"UPDATE marks SET Prediction = {s} WHERE ID = {ID}")
		mysql.connection.commit()
		if round(prediction)==1:
			res='You are likely to get placed, but maintain your consistency and also keep improving.' + str(round(s,2))
		elif round(prediction)==2:
			res='You are not likely to get placed, improve your performance wherever you are lacking.' + str(round(s,2))
			# Render the form again, but add in the prediction and remind user
			# of the values they input before
		cur.close()
		return flask.redirect('http://localhost/index2.php')
		return flask.render_template('result.html', 
									original_input={
													'Quants Marks':Quants,
													'Reasoning Marks':Reasoning,
													'English Marks':English,
													'PI Marks':PI,
													'GD Marks':GD,
													'Programming Marks':Programming},
									result=res)
	

       
if __name__ == '__main__':
    app.run(debug=True)