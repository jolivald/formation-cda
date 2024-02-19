import mongoose from 'mongoose';
import { userSchema } from './User.js';

// TODO: check mongoose enum for priority, estimate & size
export const cardSchema = new mongoose.Schema({
  title: String,
  content: String,
  assigned: [mongoose.Schema.Types.ObjectId],
  estimate: Number,
  priority: {
    type: Number,
    enum: [0, 1, 2, 3, 4]
  },
  size: {
    type: String,
    enum: ['xs', 's', 'm', 'l', 'xl']
  }
}, { timestamps: true });


export default mongoose.model('Card', cardSchema);
