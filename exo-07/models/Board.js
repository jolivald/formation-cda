import mongoose from 'mongoose';
import { cardSchema } from './Card';

export const boardSchema = new mongoose.Schema({
  title: String,
  cards: [cardSchema]
}, { timestamps: true });


export default mongoose.model('Board', boardSchema);
