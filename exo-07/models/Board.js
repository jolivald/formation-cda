import mongoose from 'mongoose';
import { cardSchema } from './Card.js';
import { userSchema } from './User.js';

export const boardSchema = new mongoose.Schema({
  title: String,
  cards: [cardSchema],
  createdBy: mongoose.Schema.Types.ObjectId,
}, {
  timestamps: true
});


export default mongoose.model('Board', boardSchema);
