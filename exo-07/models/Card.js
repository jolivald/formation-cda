import mongoose from 'mongoose';
import { userSchema } from './User';

export const cardSchema = new mongoose.Schema({
  title: String,
  content: String,
  assigned: [userSchema]
}, { timestamps: true });


export default mongoose.model('Card', cardSchema);
