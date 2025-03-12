function [c] = recogniseDeep(I,trainedNetwork)
% Recognise the student in image I
% input : I (upright RGB image)
% output : c (integer student id)

% your code ...

% example
I=imresize(I,[224 224]); %%%%% update to your network input size
[YPred] = classify(trainedNetwork,I);
c=str2double(string(YPred));

end