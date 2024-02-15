import mongoose from 'mongoose';
import passportLocalMongoose from 'passport-local-mongoose';
import { ROLE_SCRUM_MASTER, ROLE_ADMINISTRATOR } from '../constants.js';

export const userSchema = new mongoose.Schema({
  role: Number
}, { timestamps: true });

userSchema.plugin(passportLocalMongoose);
userSchema.method.isScrumMaster   = () => this.role >= ROLE_SCRUM_MASTER;
userSchema.method.isAdministrator = () => this.role >= ROLE_ADMINISTRATOR;


export default mongoose.model('User', userSchema);

