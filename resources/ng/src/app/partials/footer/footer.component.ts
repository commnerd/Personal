import { Component, OnInit } from '@angular/core';

import { faFacebook, faLinkedin, faGithub } from '@fortawesome/free-brands-svg-icons';

@Component({
  selector: 'app-footer',
  templateUrl: './footer.component.html',
  styleUrls: ['./footer.component.scss']
})
export class FooterComponent implements OnInit {

  faFacebook = faFacebook;
  faLinkedin = faLinkedin;
  faGithub = faGithub;

  year: number = (new Date()).getFullYear();

  constructor() { }

  ngOnInit(): void {
  }

}
