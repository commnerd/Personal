import { faFacebook, faLinkedin, faGithub } from "@fortawesome/free-brands-svg-icons";
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {

  faFacebook = faFacebook
  faLinkedin = faLinkedin
  faGithub = faGithub

  constructor() { }

  ngOnInit(): void {
  }

}
