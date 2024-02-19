import mongoose from 'mongoose';
import passportLocalMongoose from 'passport-local-mongoose';


export const userSchema = new mongoose.Schema({
  username: {
    type: String,
    index: false,
    required: true
  },
  role: Number
}, { timestamps: true });

userSchema.plugin(passportLocalMongoose);


export default mongoose.model('User', userSchema);

