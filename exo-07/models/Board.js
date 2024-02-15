import mongoose from 'mongoose';


const Board = new mongoose.Schema({}, { timestamps: true });


export default mongoose.model('Board', Board);
