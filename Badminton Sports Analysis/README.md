
<img width="800" height="450" alt="image" src="https://github.com/user-attachments/assets/6d213caf-39c8-45d2-b0c9-51b9c69f3dc9" />



This project proposes a hybrid method for real-time analysis of sports footage to extract key insights. It leverages YOLOv8 for accurate player detection and DeepSORT for consistent tracking across video frames. To assess player performance, the system includes movement and tactical analysis modules that compute metrics such as speed, acceleration, distance covered, and court coverage. For predictive analytics, a Long Short-Term Memory (LSTM) model is used to forecast player movements across three tactical zones defined on the court. The detection component was trained on a custom-annotated dataset to ensure robust performance and generalization.


We have provided the following files: 

Model_training.ipynb – This file contains the code for training the model. 

Project_code.ipynb – This file contains the main code.

player_detection folder – This folder contains the best model after running 50 epochs. The best model can be accessed by first clicking on player_detection then weights and there is best.pt.

Court.jpeg – This is an image which is required for project_code file to overlay the results on a court image for better visualization (E.g. Heatmaps, Zone Analysis). 

Test_clip.mp4 – This is the test clip for the project to test the model’s performance and evaluate the players. 

The full project can be found in this link : https://drive.google.com/drive/folders/1uiBO8umZv1Tv7cvvzVDRj2nN-eDQQ8U1?usp=sharing
 



