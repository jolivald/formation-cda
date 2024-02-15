import mongoose from 'mongoose';
import { userSchema } from './User';

// TODO: check mongoose enum for priority, estimate & size
export const cardSchema = new mongoose.Schema({
  title: String,
  content: String,
  priority: Number,
  estimate: Number,
  size: Number,
  assigned: [userSchema]
}, { timestamps: true });


export default mongoose.model('Card', cardSchema);
