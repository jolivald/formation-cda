import mongoose from 'mongoose';


const Card = new mongoose.Schema({}, { timestamps: true });


export default mongoose.model('Card', Card);
